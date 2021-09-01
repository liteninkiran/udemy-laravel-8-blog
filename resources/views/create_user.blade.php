<x-layout>
    <x-slot name="title">
        Create User Form
    </x-slot>

    <form action="{{ route('user.store') }}" method="POST">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="submit">
    </form>
</x-layout>