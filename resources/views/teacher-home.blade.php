@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            @if(session('successMessage'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    {{ session('successMessage') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="card-title">Subject: </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Teacher name: </h6>
                    </div>
                </div>

                <br />

                <div class="teacher-assignment-actions" style="display:flex;">
                    <div class="view-assignments card-body card mr-5" style="width:30%; margin-right:30px;">
                        {{ __('View your pending Assignments!') }}
                        <br />
                        <a href="{{ route('teacher.pending_assignments') }}">View pending Assignments</a>
                    </div>

                    <div class="view-post-assignments">

                        <div class="post-assignments card">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Create New Assignments
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">New Assignments</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('store.assignment') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="input-group mb-3">
                                                        {{-- <span class="input-group-text" id="basic-addon2">Assignment Title</span> --}}
                                                        <label class="input-group-text" id="basic-addon2">Assignment Title</label>
                                                        <input required type="text" name="title" class="form-control" placeholder="Assignment Title" aria-label="Recipient's username" aria-describedby="basic-addon2" />
                                                    </div>
                                                    <div class="input-sub_date mb-3">
                                                        <label for="submission_date">Choose the Submission Date :-</label>
                                                        <input required type="date" name="submission_date" id="submission_date" name="birthday" class="form-control"/> 
                                                    </div>
        
                                                    <div class="input-description">
                                                        <span class="input-group-text">Description</span>
                                                        <textarea required class="form-control" name="desc" aria-label="With textarea"></textarea>
                                                    </div>
                                                    <input type="hidden" name="teacher_id" value="{{ Auth::id() }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary">Post</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>


                            <br />

                            <div class="assignment-history card">
                                {{-- assignment posts shown here --}}

                                <div class="card-body">
                                    <h5 class="card-title">Assignment title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
@endsection