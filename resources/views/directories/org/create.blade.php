<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Add an Employee') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8"> <!-- Add container with max width -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> <!-- Add background, shadow, and rounded corners -->
            <div class="p-6 bg-white border-b border-gray-200"> <!-- Add padding and border -->
               <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <!-- Form fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Salary Ref Number -->
                        <div>
                            <label for="salary_ref_number" class="block text-sm font-medium text-gray-700">Salary Ref Number</label>
                            <input type="number" name="salary_ref_number" id="salary_ref_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender" id="gender" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="other" disabled selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Role -->
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <input type="text" name="role" id="role" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <!-- Competency Rating -->
                        <div>
                            <label for="competency_rating" class="block text-sm font-medium text-gray-700">Competency Rating</label>
                            <input type="number" name="competency_rating" id="competency_rating" value="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <!-- Add more fields as needed -->

                    <!-- Submit button -->
                    <div class="mt-6 flex justify-center">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </d
</x-app-layout>
