<?php
    function formatDate($date) {
        // Definir o locale para português de Portugal
        setlocale(LC_ALL, "pt_PT.utf8");

        // Converter a data para um timestamp
        $timestamp = strtotime($date);

        // Formatar a data para exibir mês por extenso e ano
        return strftime('%B %Y', $timestamp);
    }

    // Declarar uma variável booleana para verificar se o projeto é o primeiro
    $first = true;
    $today = date('Y-m-d');
?>
@extends('layout')

@section('projetos')
    <div class="section">
        <h2>
            <i class="fa-solid fa-folder-open" style="margin-right: 10px; font-size: 24px;"></i>
            <strong> PROJETOS </strong>
        </h2>
        @foreach ($projects as $project)
            <div class="project row mb-3">
                <div class="col-md-12">
                    <div class="row mb-4" style="justify-content: space-between">
                        <div class="col-md-auto">
                            <h3 class="project-title mb-0" style="cursor: pointer;" data-toggle="collapse"
                                data-target="#project-{{ $project->id }}">
                                <i class="fa-solid fa-chevron-down"></i> {{ $project->title }}
                            </h3>
                            <strong class="startend_date">{{ formatDate($project->start_date) }} - {{ $project->end_date == $today ? "" : formatDate($project->end_date) }}</strong>
                        </div>
                        <div class="col-md-auto pt-2">
                            @if ($project->link)
                                <i class="fa-solid fa-eye"></i><strong><a href="{{ $project->link }}" target="_blank" class="link mr-3"> Aceder</a></strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="project-{{ $project->id }}" class="collapse {{ $first ? 'show' : '' }}">
                        @php
                            $first = false;
                        @endphp
                        <div class="additional-info">
                            <strong>Descrição: </strong>
                            <p>{{ $project->description }}</p>
                        </div>
                        <div class="additional-info mb-1">
                            <strong>Tecnologias utilizadas: </strong>
                            <p>{{ $project->technologies }}</p>
                        </div>
                        <div class="additional-info">
                            <strong>Linguagens de programação: </strong>
                            <p>{{ $project->languages }}</p>
                        </div>
                        <div id="images-{{ $project->id }}" class="collapse show">
                            @if ($project->images->count() > 1)
                                <div id="carouselProject-{{ $project->id }}" class="carousel slide image" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($project->images as $index => $image)
                                            <li data-target="#carouselProject-{{ $project->id }}" data-slide-to="{{ $index }}"
                                                class="{{ $index == 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($project->images as $index => $image)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <a href="{{ asset('storage/' . $image->path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text }}"
                                                        class="d-block w-100 image">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselProject-{{ $project->id }}" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselProject-{{ $project->id }}" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            @else
                                @foreach ($project->images as $image)
                                    <a href="{{ asset('storage/' . $image->path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text }}"
                                            class="image">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <br>
                        @foreach ($project->files as $file)
                            <div class="file_ident">
                                <i class="fa-solid fa-download"></i><strong><a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="link mr-3"> {{ $file->name }}</a></strong>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
