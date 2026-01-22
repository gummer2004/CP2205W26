<x-layout>
        <x-slot:heading>
        Jobs
    </x-slot>

    <h1>{{$job->title}}</h1>
    <h2>{{$job->salary}}</h2>
    <h3>{{$job->employer->name}}</h3>
</x-layout>
