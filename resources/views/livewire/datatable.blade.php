<div class="mt-12 mb-8 flex flex-col gap-12">
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
            <div class="relative bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 shadow-lg -mt-6 mb-8 p-6">
                <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Recipes Table</h6>
            </div>
            <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
                <table class="w-full min-w-[640px] table-auto">
                    <thead>
                    <tr>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Name</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Category</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-5 text-left">
                            <p class="block antialiased font-sans text-[11px] font-bold uppercase text-blue-gray-400">Actions</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($recipes as $recipe)
                            <tr>
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">
                                        {{$recipe->name}}
                                    </p>
                                </td>
                                <td class="py-3 px-5 border-b border-blue-gray-50">
                                    <p class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">
                                        {{$recipe->category->name}}
                                    </p>
                                </td>
                                <td class="py-3 px-5 border-b border-blue-gray-50"><a href="#" class="block antialiased font-sans text-xs font-semibold text-blue-gray-600">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="py-3">
                                {{$recipes->links()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
</div>
