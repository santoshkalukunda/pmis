@extends('layouts.app')

@section('content')
    @php
        $title = $project->name;
    @endphp
    @push('styles')
        <style>
            .project-photo {
                max-height: 300px;
                min-height: 300px;
                max-width: 340px;
                min-width: 340px;
                object-fit: cover;
                overflow: hidden;
                margin: 4px;
            }

            .delete {
                background: rgb(244, 69, 46);
                background: linear-gradient(90deg, rgba(244, 69, 46, 1) 0%, rgba(244, 69, 46, 0.025647759103641476) 43%, rgba(244, 69, 46, 0) 100%);
                background: rgb(244, 69, 46);
                background: linear-gradient(90deg, rgba(244, 69, 46, 0.7147233893557423) 100%, rgba(244, 69, 46, 0.025647759103641476) 100%, rgba(244, 69, 46, 0) 100%);
            }
        </style>
    @endpush
    <div class="container">
        <div class="row">
            @include('project.nav')
            <div class="col-md-12 py-2 bg-white">
                <form action="{{ route('photos.store', $project) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="myfile"> <div>तस्बीर अपलोड गर्नुहोस्:</div> </label>
                            <input type="file" id="myfile" name="photo" accept="image/*">
                        </div>
                        <div class="col-md-1 mt-4 py-2 md-mt-0 md-py-0">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 my-2">
                <div class="row">
                    @forelse ($photos as $photo)
                        <div class="col-md-4 my-2">
                            <div class="position-relative">
                                <a href="{{ url('storage/' . $photo->photo) }}" class="position-relative">
                                    <img class="project-photo" src="{{ asset('storage/' . $photo->photo) }}"
                                        alt="poject-photo">
                                </a>
                                <div class="position-absolute bottom-0 start-50 translate-middle-x delete ">
                                    <form action="{{ route('photos.destroy', $photo) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item btn form-control text-white delete" type="submit"
                                            onclick="return confirm('Are you sure to delete?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-red text-center">
                        कुनै पनि डाटा उपलब्ध छैन
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
