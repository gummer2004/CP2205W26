<x-layout>
        <x-slot:heading>
        Jobs
    </x-slot>
    <h1>Hi from the Jobs Page</h1>

    <p>&nbsp;</p>
    @foreach ($jobs as $job)
        <li><a href="/jobs/{{$job->id}}">{{$job['title']}}</a> - Company: {{$job->employer->name}}</li>
    @endforeach

    <div>
        {{ $jobs->links() }}
    </div>
</x-layout>
