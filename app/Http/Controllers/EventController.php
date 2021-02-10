<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $attends = UserEvent::where('user_id', $user->id)->get();
        $events = Event::all();

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
        $request['reservationtime'] = explode(' - ', $request['reservationtime']);
        $request['start'] = date('Y-m-d H:i:s', strtotime($request['reservationtime'][0]));
        $request['end'] = date('Y-m-d H:i:s', strtotime($request['reservationtime'][1]));

        $user = Auth::user();

        if ($user->hasRole('Mahasiswa')) {
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
            'slug' => $this->createSlug($request->title),
            'creator_id' => $user->id,
            'creator_type' => $creator,
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Data konselor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $users = collect(new User);
        foreach (explode(';', $event->attendant_id) as $attend_id) {
            $attendant = User::where('id', $attend_id)->first();
            $users =   $users->addIfNotNull($attendant);
        }
        return view('events.show', compact('event', 'users'));
    }

    public function showAttend(Event $event)
    {
        return view('events.Attend', compact('event'));
    }

    public function showSlug($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('events.show', compact('event'));
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
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Data konselor berhasil diubah');
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

    public function finnish(Event $event)
    {

        $attends = UserEvent::where('event_id', $event->id)->get();

        $temp = '';
        foreach ($attends as $attend) {
            $temp .= $attend->user_id  . ";";
        }

        $event->attendant_id = $temp;
        $event->save();

        UserEvent::where('event_id', $event->id)->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event telah selesai');
    }
}
