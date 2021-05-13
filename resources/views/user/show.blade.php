@extends('layouts.app')

@section('content')

                    {{--<table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                                 alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$users->name}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$users->email}}</div>
                                    <div class="text-sm text-gray-500"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$users->created_at}}
                            </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$users->role}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{url('user/{id}/edit')}}"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>

                            <!-- More people... -->
                            </tbody>
                    </table>--}}
                    <div class="w-4/5 m-auto pt-10">
                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input class="form-input mt-1 block w-full" value="{{$users->name}}" placeholder="Jane Doe">
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Email Id</span>
                        <input class="form-input mt-1 block w-full" value="{{$users->email}}" placeholder="Jane Doe">
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Role</span>
                        <input class="form-input mt-1 block w-full" value="{{$users->role}}" placeholder="Jane Doe">
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Created At</span>
                        <input class="form-input mt-1 block w-full" value="{{$users->created_at}}" placeholder="Jane Doe">
                    </label>
                        <a href="" type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Edit</a>
                    </div>



@endsection

