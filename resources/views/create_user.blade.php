<x-layout>

    <x-slot name="title">
        Create User Form
    </x-slot>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your name">
        <input type="email" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter password">
        <input type="submit">
    </form>

</x-layout>
