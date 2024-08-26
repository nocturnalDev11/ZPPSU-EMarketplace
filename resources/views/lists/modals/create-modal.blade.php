<!-- Create product modal -->
<div id="product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Product content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Product header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create new product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="product-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Product body -->
            <form action="{{ route('product.store') }}" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Upload photo -->
                    <div class="col-span-2 items-center justify-center w-full">
                        <p class="block mb-2 text-sm font-medium text-gray-900">Upload a photo (required)</p>
                        <label for="dropzone-file-product" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="prod_picture" id="dropzone-file-product" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="image-preview-container-product" class="flex">
                        <!-- Dynamically added image previews will go here -->
                    </div>
                    <!-- Product name -->
                    <div class="col-span-2">
                        <label for="prod_name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="prod_name" id="prod_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                    </div>
                    <!-- Product price -->
                    <div class="col-span-2">
                        <label for="prod_price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="prod_price" id="prod_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="₱2999" required="">
                    </div>
                    <!-- Product category -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="prod_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="prod_category" name="prod_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="">Select category</option>
                            <option value="Apparel">Apparel</option>
                            <option value="School supplies">School Supplies</option>
                            <option value="Stationery">Stationery</option>
                            <option value="Electronics">Electronics</option>
                            <option value="University merchandise">University Merchandise</option>
                        </select>
                    </div>
                    <!-- Product condition -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="prod_condition" class="block mb-2 text-sm font-medium text-gray-900">Condition</label>
                        <select id="prod_condition" name="prod_condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="">Select condition</option>
                            <option value="New">New</option>
                            <option value="Used - like new">Used - Like new</option>
                            <option value="Used - like good">Used - Like good</option>
                            <option value="Used - like fair">Used - Like fair</option>
                        </select>
                    </div>
                    <!-- Product description -->
                    <div class="col-span-2">
                        <label for="prod_description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                        <textarea id="prod_description" name="prod_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Create post modal -->
<div id="post-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create new post
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="post-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('posts.store') }}" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Post title -->
                    <div class="col-span-2">
                        <label for="post_title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" name="post_title" id="post_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type post title" required="">
                    </div>
                    <!-- Upload photo -->
                    <div class="col-span-2 items-center justify-center w-full">
                        <p class="block mb-2 text-sm font-medium text-gray-900">Upload a photo (optional)</p>
                        <label for="dropzone-file-post" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="post_picture" id="dropzone-file-post" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="image-preview-container-post" class="flex">
                        <!-- Dynamically added image previews will go here -->
                    </div>
                    <!-- List type -->
                    <div class="col-span-2">
                        <label for="post_list_type" class="block mb-2 text-sm font-medium text-gray-900">List type</label>
                        <select id="post_list_type" name="post_list_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected>Select list type:</option>
                            <option value="Products">Looking for a product</option>
                            <option value="Services">Looking for a services</option>
                            <option value="Trades">Looking for trading</option>
                        </select>
                    </div>
                    <!-- Post content -->
                    <div class="col-span-2">
                        <label for="post_content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                        <textarea id="post_content" name="post_content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Post
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Create service modal -->
<div id="service-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create new services
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="service-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Upload photo -->
                    <div class="col-span-2 items-center justify-center w-full">
                        <p class="block mb-2 text-sm font-medium text-gray-900">Upload a photo (optional)</p>
                        <label for="dropzone-file-service" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="services_picture" id="dropzone-file-service" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="image-preview-container-service" class="flex">
                        <!-- Dynamically added image previews will go here -->
                    </div>
                    <!-- Service title -->
                    <div class="col-span-2">
                        <label for="services_title" class="block mb-2 text-sm font-medium text-gray-900">Service title</label>
                        <input type="text" name="services_title" id="services_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type service name" required="">
                    </div>
                    <!-- Service fee -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="services_fee" class="block mb-2 text-sm font-medium text-gray-900">Service fee</label>
                        <input type="number" name="services_fee" id="services_fee" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="₱2999" required="">
                    </div>
                    <!-- Service category -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="services_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="services_category" name="services_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="Tutoring services">Tutoring services</option>
                            <option value="Video editing">Video editing</option>
                            <option value="Photo editing">Photo editing</option>
                            <option value="Videography">Videography</option>
                            <option value="Photography">Photography</option>
                            <option value="Writing">Writing</option>
                            <option value="Coding services">Coding services</option>
                            <option value="Drawing">Drawing</option>
                            <option value="Painting">Painting</option>
                            <option value="Catering">Catering</option>
                            <option value="Troubleshooting">Troubleshooting</option>
                            <option value="Vehicle repair">Repair services</option>
                        </select>
                    </div>
                    <!-- Service description -->
                    <div class="col-span-2">
                        <label for="services_description" class="block mb-2 text-sm font-medium text-gray-900">Service description</label>
                        <textarea id="services_description" name="services_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new service
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Create trade modal -->
<div id="trade-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create new trading
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="trade-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('trades.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Upload photo -->
                    <div class="col-span-2 items-center justify-center w-full">
                        <p class="block mb-2 text-sm font-medium text-gray-900">Upload a photo (optional)</p>
                        <label for="dropzone-file-trade" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="trade_picture" id="dropzone-file-trade" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="image-preview-container-trade" class="flex">
                        <!-- Dynamically added image previews will go here -->
                    </div>
                    <!-- Trade title -->
                    <div class="col-span-2">
                        <label for="trade_title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" name="trade_title" id="trade_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type trading title" required="">
                    </div>
                    <!-- Trade category -->
                    <div class="col-span-2">
                        <label for="trade_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="trade_category" name="trade_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="">Select category</option>
                            <option value="Apparel">Apparel</option>
                            <option value="School supplies">School Supplies</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Stationery">Stationery</option>
                            <option value="University merchandise">University Merchandise</option>
                        </select>
                    </div>
                    <!-- Trade description -->
                    <div class="col-span-2">
                        <label for="trade_description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea id="trade_description" name="trade_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write trading description here"></textarea>
                    </div>
                    <!-- Trade status -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="trade_status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="trade_status" name="trade_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="Available">Available</option>
                            <option value="Pending">Pending</option>
                            <option value="In-Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Expired">Expired</option>
                            <option value="Negotiating">Negotiating</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <!-- Trade type -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="trade_type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                        <select id="trade_type" name="trade_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="Buy">Buy</option>
                            <option value="Sell">Sell</option>
                            <option value="Exchange">Exchange</option>
                            <option value="Donation">Donation</option>
                            <option value="Rental">Rental</option>
                            <option value="Service offering">Service Offering</option>
                            <option value="Service request">Service Request</option>
                            <option value="Barter">Barter</option>
                        </select>
                    </div>
                    <!-- Trade value -->
                    <div class="col-span-2">
                        <label for="trade_value" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="trade_value" id="trade_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="₱2999" required="">
                    </div>
                    <!-- Trade conditions -->
                    <div class="col-span-2">
                        <label for="trade_conditions" class="block mb-2 text-sm font-medium text-gray-900">Conditions</label>
                        <textarea id="trade_conditions" name="trade_conditions" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write trading conditions here"></textarea>
                    </div>
                    <!-- Trade duration -->
                    <div class="col-span-2">
                        <label for="trade_duration" class="block mb-2 text-sm font-medium text-gray-900">Trading duration</label>
                        <input type="date" name="trade_duration" id="trade_duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center0">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new trading
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to handle file uploads and image previews
    function setupFileUploadAndPreview(dropzoneId, imagePreviewContainerId) {
        const dropzone = document.getElementById(dropzoneId);
        const imagePreviewContainer = document.getElementById(imagePreviewContainerId);

        dropzone.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    const imgSrc = e.target.result;

                    // Create a new image element
                    const imgElement = document.createElement('img');
                    imgElement.src = imgSrc;
                    imgElement.style.width = '100%'; // Example: set width to 100%

                    // Create a container for the image
                    const imageBox = document.createElement('div');
                    imageBox.classList.add('relative', 'overflow-hidden', 'aspect-ratio-4/3', 'bg-gray-200', 'rounded-lg', 'mr-4', 'mb-4');
                    imageBox.appendChild(imgElement);

                    // Clear previous content and append the new image box
                    imagePreviewContainer.innerHTML = '';
                    imagePreviewContainer.appendChild(imageBox);
                };
            }
        });
    }

    setupFileUploadAndPreview('dropzone-file-product', 'image-preview-container-product');
    setupFileUploadAndPreview('dropzone-file-service', 'image-preview-container-service');
    setupFileUploadAndPreview('dropzone-file-post', 'image-preview-container-post');
    setupFileUploadAndPreview('dropzone-file-trade', 'image-preview-container-trade');
});
</script>
