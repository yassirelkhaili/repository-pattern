<x-app-layout>
    @session("success")
    <p class="text-success">{{ session()->get("success") }}</p>
    @endsession
    <a href="/users/store"><button class="btn btn-primary">Add User</button></a>
    <section>
        <table class="table-dark table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Firstname</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   @forelse ($users as $user)
   <tr>
    <th scope="row">{{ $user->id }}</th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td class="d-flex gap-2">
      <a href="{{route("users.update", $user->id)}}"><button type="button" class="btn btn-success">Edit</button></a>
      <form action="{{route("users.destroy", $user->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
  </tr>
   @empty
       <h1>No data</h1>
   @endforelse
  </tbody>
</table>
    </section>
</x-app-layout>