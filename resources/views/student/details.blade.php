<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center pt-10">
        <div class="w-full sm:max-w-4xl bg-white shadow-md rounded-lg p-8 text-center">
            <!-- Logo Section -->


            <!-- Header Section -->
            <div class="flex items-center justify-center mb-8">
                <img src="{{ asset('storage/' . $student->student_picture) }}" alt="Student Picture" class="w-24 h-24 rounded-full shadow mr-6" />
                <div class="text-left">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $student->first_name }} {{ $student->last_name }}</h3>
                    <p class="text-gray-600 mt-1">Passport Number: {{ $student->passport_number }}</p>
                    <p class="text-gray-600">Date of Birth: {{ $student->date_of_birth }}</p>
                </div>
            </div>

            <!-- Offer Letter Message -->
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Congratulations on Your Offer Letter</h2>
            <p class="text-gray-600 mb-8">You've been offered a provisional offer letter by London Professional Academy. Check the course details below.</p>

            <!-- Course Information Section -->
            <div class="mb-8">
                <table class="w-full text-left border-collapse">
                    <tbody>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-gray-700 font-semibold">Course Name</td>
                            <td class="py-4 px-6 text-gray-800">{{ $student->course->course_name ?? 'N/A' }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-gray-700 font-semibold">Course Level</td>
                            <td class="py-4 px-6 text-gray-800">18 Years of Education</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-gray-700 font-semibold">Qualification</td>
                            <td class="py-4 px-6 text-gray-800">Masters/M.Phil</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-gray-700 font-semibold">Commencement</td>
                            <td class="py-4 px-6 text-gray-800">08 September, 2025</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-gray-700 font-semibold">Duration</td>
                            <td class="py-4 px-6 text-gray-800">2 Years</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-gray-700 font-semibold">Completion</td>
                            <td class="py-4 px-6 text-gray-800">30 June, 2027</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Download Buttons Section -->
            <div class="flex justify-center gap-4">
                <a href="{{ route('letters.offer', ['student' => $student->id]) }}" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">Download Provisional Offer Letter</a>
                <a href="{{ route('letters.acceptance', ['student' => $student->id]) }}" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">Download Acceptance Letter</a>
            </div>
        </div>
    </div>
</x-guest-layout>