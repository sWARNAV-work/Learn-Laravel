<x-layout>
    <form action="/register" method="POST">
        @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 m-auto mt-20">
        <legend class="fieldset-legend">Register</legend>

        <label class="label">Name</label>
        <input type="name" class="input" name="name" placeholder="Kimi no na wa" required/>

        <label class="label">Email</label>
        <input type="email" class="input" name="email" placeholder="Your Email" required/>

        <label class="label">Password</label>
        <input type="password" class="input" name="password" placeholder="Password" required/>

        <button class="btn btn-neutral mt-4">Register</button>
    </fieldset>
    </form>
</x-layout>