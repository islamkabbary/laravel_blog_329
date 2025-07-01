@extends('layouts.app')


@section('title', 'Home')



@section('header')
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection



@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {{-- <x-card-post-component title="first title from new component" subtitle="first subtitle from new component"/> --}}
                @foreach ($posts as $post)
                    <x-card-post-component>
                        <x-slot name="title">{{ $post->title }}</x-slot>
                        <x-slot name="subtitle">{{ $post->content }}</x-slot>
                        <x-slot name="author">{{ $post->user->name }}</x-slot>
                    </x-card-post-component>
                @endforeach
                {{ $posts->links() }}
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
