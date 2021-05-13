@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-sm-12 px-0">
                <h1 class="display-4 fst-italic"><Strong>"Today Quoute"</Strong></h1>
                <p class="lead my-6">"In some ways, programming is like painting. You start with a blank canvas and certain basic raw
                    materials. You use a combination of science, art, and craft to determine what to do with them."
                   </p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">- Andrew Hunt</a></p>
            </div>
        </div>
        <div class="container border-dark">
            <div class="row">
                <div class="col-lg">
                    <img src="https://i.ibb.co/MPV2CCk/Problem-of-The-Day-Develop-the-Habit-of-Coding.png"
                         alt="Problem-of-The-Day-Develop-the-Habit-of-Coding" border="0">
                </div>
                <div class="col-lg">
                    <div class="m-auto sm:m-auto text-left w-4/5 block">
                        <h2 class="text-3xl font-extrabold text-gray-600">
                            Problem of The Day – Develop the Habit of Coding
                        </h2>
                        <p>Do you find it difficult to develop a habit of Coding</p>

                        <p class="font-extrabold text-gray-600 text-s pb-9">
                            If we relate it to the career goals – when you solve just a single programming problem each day for
                            1 year consistently then by the end of the year, you’d have solved around 365 Problems!!! Even you
                            can say it like you would have solved a majority of the programming problems that are often asked in
                            the interviews of tech giants – Isn’t it something great…?? </p>
                        <a class="btn btn-dark rounded" href="/blog">Find
                            Out More</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="p-4 p-md-5 mb-4 text-white rounded bg-primary">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Recent Post</h1>
                <p class="lead my-3">"Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but
                    also the leap into electronic typesetting</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>


@endsection
