<x-layout>

    <x-slot name="title">
        Edit User Form
    </x-slot>

    <form action="{{ route('update', $user->id) }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your name" value="{{ $user->name }}">
        <input type="email" name="email" placeholder="Enter your email" value="{{ $user->email }}">
        <input type="password" name="password" placeholder="Enter password" value="{{ $user->password }}">
        <input type="submit" value="Update User">
    </form>

</x-layout>
