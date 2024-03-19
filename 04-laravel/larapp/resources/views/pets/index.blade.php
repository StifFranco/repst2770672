@extends('layouts.app')
@section('title', 'Pets Page - PetsApp')

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
            <h1>Module Pets</h1>
            <a class="add" href="{{ url('pets/create') }}">
                <img src="{{ asset('images/add-icon.svg') }}" width="30px" alt="add">
                Add Pet
            </a>

            <table>
                <tbody>

                    @foreach ($pets as $pet)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $pet->photo) }}" alt="Pet">
                            </td>
                            <td>
                                <span>{{ $pet->name }}</span>
                                <span>{{ $pet->type }}</span>
                            </td>
                            <td>
                                <a href="{{ url('pets/' . $pet->id) }}" class="show">
                                    <img src="{{ asset('images/icon-Search.svg') }}" alt="show icon">
                                </a>
                                <a href="{{ url('pets/' . $pet->id . '/edit') }}" class="edit">
                                    <img src="{{ asset('images/icon -Edit.svg') }}" alt="edit icon">
                                </a>
                                <form action="{{ url('pets/'.$pet->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn-delete">
                                        <img src="{{ asset('images/Icon-Delete.svg') }}" alt="delete icon">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        {{--<td colspan="3">{{ $pets->links('layouts.paginator') }}--}}

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
    <script>
        $(document).ready(function() {
            $('body').on('click', '.btn-delete', function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#22799e",
                    cancelButtonColor: "#2ec4b6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.isConfirmed) {
                            $(this).parent().submit()
                        }
                    }
                })

            })
        })
    </script>
@endsection
