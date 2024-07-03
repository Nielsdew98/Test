@extends('layouts.app')

@section('content')
        <article
            class="bg-[#fff] md:my-[5rem] md:py-8 pb-8 md:rounded-xl md:max-w-screen-md mx-auto"
        >
            <picture>
                <img
                    src="https://placehold.co/600x400"
                    width="1312"
                    height="600"
                    class="md:max-w-[90%] md:mx-auto md:rounded-xl"
                />
            </picture>
            <div class="px-8 font-outfit text-wenge-brown">
                <h1 class="font-fancy text-4xl mt-8 text-dark-charcoal">
                    {{$recipe->name}}
                </h1>
                <section class="bg-rose-white mt-6 p-5 rounded-xl">
                    <h2 class="text-dark-raspberry text-xl font-semibold ml-2">
                        Preparation time
                    </h2>
                    <ul class="list-disc mt-3 ml-8 text-lg marker:text-dark-raspberry">
                        <li class="pl-3">
                            <p>
                                <span class="font-semibold">Total: </span>Approximately {{$recipe->duration_minutes}}
                                minutes
                            </p>
                        </li>
                    </ul>
                </section>
                <div class="mt-8">
                    @livewire('ingredients-changer', ['ingredients' => $recipe->ingredients])
                </div>
                <div class="w-full h-px bg-light-gray mx-auto mt-8"></div>
                <div class="mt-8">
                    <h3 class="font-fancy text-3xl text-nutmeg">Instructions</h3>
                    <ol
                        class="marker:text-nutmeg marker:font-semibold marker:font-outfit list-decimal mt-4 ml-6"
                    >
                        <li class="pl-4">
                            <p>
                                {{$recipe->instructions}}
                            </p>
                        </li>
                    </ol>
                </div>
                <div class="mt-8">
                    <h3 class="font-fancy text-3xl text-nutmeg">Recipes you may like</h3>
                    <ul
                        class="mt-4 ml-6"
                    >
                        @foreach($suggested as $suggestedRecipe)
                            <li class="pl-4">
                                <a href="{{URL::route('recipe.show', $suggestedRecipe)}}" class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">{{$suggestedRecipe->name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </article>
@endsection
