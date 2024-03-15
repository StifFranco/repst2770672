@extends('layouts.app')
@section('title', 'Users Page - PetsApp')

@section('content')
<main>
    <header class="nav level-2">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/icon-back.svg') }}" alt="back">
        </a>
        <img src="{{ asset('images/Pet Logo.svg') }}" alt="logo">
        <a href="" class="mburguer">
            <img src="{{ asset('images/Burguer Menu.svg') }}" alt="menu-burguer">
        </a>
    </header>

    <section class="module">
        <h1>Module Users</h1>
        <a class="add" href="{{ url('users/create') }}">
          <img src="{{ asset('images/add-icon.svg') }}" width="30px" alt="add">
          Add User
        </a>

       <table>
            <tbody>

                @foreach ($users as $user)
                    
    
                <tr>
                    <td>
                        <img src="{{ asset('images/'. $user->photo) }}" alt="User">
                    </td>
                    <td>
                        <span>{{ $user->fullname }}</span>
                        <span>{{ $user->role }}</span>
                    </td>
                      <td>
                        <a href="{{ url('users/' . $user->id) }}" class="show">
                            <img src="{{ asset('images/icon-Search.svg') }}" alt="show icon">
                        </a>
                        <a href="{{ url('users/edit/' . $user->id) }}" class="edit">
                            <img src="{{ asset('images/Icon -Edit.svg') }}" alt="edit icon">
                        </a>
                        <a href="javascript:;" class="delete" data-id= "{{ $user->id }}">
                            <img src="{{ asset('images/Icon-Delete.svg') }}" alt="delete icon">
                        </a>
                      </td>
                </tr>
                @endforeach  
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">{{ $users->links('layouts.paginator') }}
                    
                    </td>
                </tr>
            </tfoot>
       </table>
    </section>

</main>
@endsection

@section('js')
      @if (session('message'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    position: "top-end",
                    title: "Congratulions!",
                    text: "{{ session('message') }}",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                })
            })
        </script>
      @endif
    @endsection  
