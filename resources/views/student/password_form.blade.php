<x-guest-layout>
    <div class="flex flex-col items-center justify-center pt-10">
        <div class="w-full sm:max-w-md bg-white shadow-md rounded-lg p-8">
            <!-- Header Section -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Enter Student ID and Passport Number</h2>

            <!-- Form Section -->
            <form action="{{ route('student.verifyPassword') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="student_id" class="block text-gray-700 font-semibold mb-2">Student ID:</label>
                    <input type="text" name="student_id" id="student_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., CS202320230001">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Passport Number:</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">Submit</button>
            </form>


            <!-- Error Message Section -->
            @if ($errors->any())
            <div class="mt-4 text-red-600 text-center">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>
    </div>
</x-guest-layout>