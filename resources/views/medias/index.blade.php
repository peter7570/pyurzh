<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @extends('layout.app')

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Ant Media test</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('medias.create') }}"> создать стрим</a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Desc</th>
                            <th>Preview</th>
                         <!--   <th>Sid</th>
                            <th>Uid</th> -->
                        </tr>
                        @foreach ($medias as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->thumb }}</td>
                              <!--  <td>{{ $item->sid }}</td>
                                <td>{{ $item->uid }}</td> -->
                                <td>
                                    <a class="btn btn-info" href="{{ route('medias.show',$item->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('medias.edit',$item->id) }}">Edit</a>
                                    <form action="{{ route('medias.destroy',$item->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

            </div>
        </div>
    </div>
</x-app-layout>


