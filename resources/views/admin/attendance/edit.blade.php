@extends('admin.admin')

@section('title', 'Edit Attendance')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Attendance</h1>

    @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nrp" class="block text-gray-700 font-bold mb-2">NRP</label>
            <select name="nrp" id="nrp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($members as $member)
                    <option value="{{ $member->nrp }}" {{ $attendance->nrp == $member->nrp ? 'selected' : '' }}>
                        {{ $member->nrp }} - {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="act_id" class="block text-gray-700 font-bold mb-2">Activity</label>
            <select name="act_id" id="act_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}" {{ $attendance->act_id == $activity->id ? 'selected' : '' }}>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="hadir" {{ $attendance->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="tidak hadir" {{ $attendance->status == 'tidak hadir' ? 'selected' : '' }}>Tidak Hadir</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
    </form>
</div>
@endsection
