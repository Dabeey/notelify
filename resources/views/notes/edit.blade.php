@extends('layouts.app')

@section('content')

    {{-- 1. --}}
    {{-- make it row --}}
    {{-- justify-content-center --}}


    {{-- 2. Page header--}}
    {{-- set color for lg screen --}}
    {{-- d-flex , justify-content-between--}}
    {{-- align item center --}}
    {{-- set margin  --}} 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- page header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-dark-emphasis m-0 mb-1">Edit Note</h2>
                    <p class="text-muted m-0">Update your note details</p>
                </div>
            </div>

            {{-- success message --}}
            @include('notes.partials.success-message')

            <div class="card">
                <div class="card-body p-4">
                    {{-- create post form --}}

                    {{-- 1. --}}
                    {{-- After creating the basic blade file, create the resource route in web.php then the create note in note controller. --}}
                    {{-- * link the route to the form "{{route('notes.store')}}" --}}
                    {{-- * Add csrf token to protect the form from csrf attacks --}}
                    {{-- * Apply the is-invalid class to apply a red border to the textarea when there is an error "@error('title') is-invalid @enderror" --}}
                    {{-- * Display the error message --}}
                    {{-- * Retain previously typed content using the "old{{}}" method "value="old{{'title'}}"" --}}
                    {{-- *Display success message [above te card/ under page header--}}

                    <form action="{{route('notes.update', $note->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input 
                                type="text" 
                                id="title"
                                name="title"
                                value="{{old('title',$note->title)}}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter a descriptive title"
                                autofocus>

                                {{-- Display the error message --}}
                                @error('title')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea 
                                id="content"
                                name="content"
                                value="{{old('content', $note->content)}}"
                                class="form-control @error('content') is-invalid @enderror"
                                rows="8"
                                placeholder="Write your note content here..."
                                ></textarea>

                                 {{-- Display the error message --}}
                                 @error('content')
                                 <span class="invalid-feedback">{{$message}}</span>
                             @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-info" type="submit">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            
        </div>
    </div>
</div>
    
@endsection