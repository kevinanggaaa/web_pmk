<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Profile;
use App\Models\UserEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view event')->only('index');
        $this->middleware('permission:view detail event')->only('show');
        $this->middleware('permission:view detail event')->only('showSlug');
        $this->middleware('permission:add event')->only('create');
        $this->middleware('permission:edit event')->only('edit');
        $this->middleware('permission:edit event')->only('finnish');
        $this->middleware('permission:delete event')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $attends = UserEvent::where('user_id', $user->id)->get();
        $roles = 0;
        
        foreach ($user->roles as $role){
            if($role->name == 'Mahasiswa'){
                $roles += 1;
            }
            else if($role->name == 'Dosen'){
                $roles += 10;
            }
            else if($role->name == 'Alumni'){
                $roles += 100;
            }
            else if($role->name == 'Super Admin'){
                $roles = 0;
            }
        }

        if($roles == 1){
            $events = Event::where('type', '!=', 'Lecturer')->where('type', '!=', 'Alumni')->get();
        }
        else if($roles == 10){
            $events = Event::where('type', '!=', 'Alumni')->where('type', '!=', 'Student')->get();
        }
        else if($roles == 100){
            $events = Event::where('type', '!=', 'Lecturer')->where('type', '!=', 'Student')->get();
        }
        else if($roles == 11){
            $events = Event::where('type', '!=', 'Alumni')->get();
        }
        else if($roles == 101){
            $events = Event::where('type', '!=', 'Lecturer')->get();
        }
        else if($roles == 110){
            $events = Event::where('type', '!=', 'Student')->get();
        }
        else if($roles == 0 || $roles == 111){
            $events = Event::all();
        }

        

        return view('events.index', compact('events', 'user', 'attends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/event';
            $file->move($tujuan_upload, $nama_file);
        }

        $request['reservationtime'] = explode(' - ', $request['reservationtime']);
        $request['start'] = date('Y-m-d H:i:s', strtotime($request['reservationtime'][0]));
        $request['end'] = date('Y-m-d H:i:s', strtotime($request['reservationtime'][1]));

        $user = Auth::user();

        if ($user->hasRole('Mahasiswa') || $user->hasRole('Super Admin')) {
            $creator = 'mahasiswa';
        } elseif ($user->hasRole('Dosen')) {
            $creator = 'dosen';
        } elseif ($user->hasRole('Alumni')) {
            $creator = 'alumni';
        }

        Event::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'type' => $request['type'],
            'start' => $request['start'],
            'end' => $request['end'],
            'image' => $nama_file,
            'slug' => $this->createSlug($request->title),
            'speaker' => $request['speaker'],
            'location' => $request['location'],
            'link' => $request['link'],
            'creator_id' => $user->id,
            'creator_type' => $creator,
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Request $request)
    {
        $creator = User::where('id', $event->creator_id)->first();
        $users = collect(new User);
        foreach (explode(';', $event->attendant_id) as $attend_id) {
            $attendant = User::where('id', $attend_id)->first();
            $users =   $users->addIfNotNull($attendant);
        }
        
        return view('events.show', compact('event', 'users', 'creator'));
    }

    public function showSlug($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $users = collect(new User);
        foreach (explode(';', $event->attendant_id) as $attend_id) {
            $attendant = User::where('id', $attend_id)->first();
            $users =   $users->addIfNotNull($attendant);
        }
        return view('events.show', compact('event', 'users'));
    }

    public function attendView($slug)
    {
        $event = Event::where('slug', $slug)->first();
        if($event->attendant_count == 0){
            return view('events.attend', compact('event'));
        }
        else{
            $message = "Event telah selesai";
            return view('events.response', compact('message'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $request['reservationtime'] = explode(' - ', $request['reservationtime']);
        $request['start'] = date('Y-m-d H:i:s', strtotime($request['reservationtime'][0]));
        $request['end'] = date('Y-m-d H:i:s', strtotime($request['reservationtime'][1]));

        $event->title = $request['title'];
        $event->description = $request['description'];
        $event->type = $request['type'];
        $event->start = $request['start'];
        $event->end = $request['end'];
        $event->report = $request['report'];
        $event->slug = $this->createSlug($request->title);
        $event->speaker = $request['speaker'];
        $event->location = $request['location'];
        $event->link = $request['link'];
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event berhasil diubah');
    }

    public function updateImage(Request $request, Event $event)
    {
        
        $file = $request['image'];
        $nama_file = time().'_'.$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'landingpage/event';
        $file->move($tujuan_upload, $nama_file);
        
        $event->image = $nama_file;
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Foto Event berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Data konselor berhasil dihapus');
    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title, '-');

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Event::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

    public function attend(Request $request, Event $event)
    {
        $profiles = Profile::all();
        $userEvents = UserEvent::all();
        $temp = 0;
        foreach($profiles as $profile){
            //mengecek apakah user terdaftar pada database
            if($request['nrp'] == $profile->profile_id){
                foreach($userEvents as $userEvent){
                    //mengecek apakah user telah melakukan absensi atau tidak 
                    if($profile->user_id == $userEvent->user_id && $event->id == $userEvent->event_id){
                        $temp = 2;
                        $message = 'Anda telah melakukan absensi';
                        return view('events.response',compact('message'));
                    }
                }
                //jika belum melakukan absen, maka store datanya ke database
                if($temp != 2){
                    UserEvent::create([
                        'user_id' => $profile->user_id,
                        'event_id' => $event->id,
                    ]);
                    $temp = 1;
                }
                
            }
        }
        //jika telah berhasil melakukan absen
        if($temp == 1){
            $message = 'Anda berhasil melakukan absensi';
            return view('events.response',compact('message'));
        }
        //jika tidak terdaftar sebagai user
        else{
            $message = 'Anda tidak terdaftar sebagai user';
            return view('events.response',compact('message'));
        }
        
    }

    public function finnish(Event $event)
    {
        $user = Auth::user();
        if($event->creator_id == $user->id){
            $attends = UserEvent::where('event_id', $event->id)->get();
            $count = 0;
            $temp = '';

            //menyimpan data dari peserta yang melakukan absen pada database UserEvent menjadi string, serta menghitung jumlah peserta
            foreach ($attends as $attend) {
                $temp .= $attend->user_id  . ";";
                $count += 1;
            }

            //menginput data string peserta dan jumlah ke database
            $event->attendant_count = $count;
            $event->attendant_id = $temp;
            $event->save();

            //menghapus data peserta pada userEvent yang telah disimpan pada string peserta
            UserEvent::where('event_id', $event->id)->delete();

            return redirect()->route('events.index')
                ->with('success', 'Event telah selesai');
        }
        else{
            abort(401);
        }
    }
}
