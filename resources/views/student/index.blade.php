@extends('layouts.app')

@section('content')


<div class="container mx-auto p-6"
    x-data="{ 
        showModal: false, 
        showGenerateModal: false, 
        showDeleteModal: false, 
        selectedUser: {}, 
        selectedEmailId: '' ,
         sortBy: '',
        searchTerm: '',
     }">
    <!-- <div class="container mx-auto p-6"
        x-data="{ 
        showModal: false, 
        showGenerateModal: false, 
        showDeleteModal: false, 
        selectedUser: {} }"> -->
    <!-- Notification -->

    <!-- Notification -->
    <div x-data="{ show: {{ session('success') ? 'true' : 'false' }} }"
        x-init="if (show) setTimeout(() => show = false, 8000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg"
        style="display: none;"
        x-cloak>
        {{ session('success') }}
    </div>
    <h2 class="text-2xl font-semibold mb-4">Manage Students</h2>

    <div class="bg-white shadow-md rounded p-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">Students</h3>
            <div class="flex space-x-2">
                <!-- Search Input -->
                <input type="text" x-model="searchTerm" placeholder="Search students..." class="border p-1 rounded-md" @input.debounce.500="$refs.searchForm.submit()">
                <!-- Sort Dropdown -->
                <select x-model="sortBy" class="border p-1 rounded-md" @change="$refs.searchForm.submit()">
                    <option value="">Sort By</option>
                    <option value="student_id">Student ID</option>
                    <option value="name">Name</option>
                    <option value="course_name">Course Name</option>
                    <option value="agent">Agent Name</option>
                </select>
                <!-- Order Toggle -->
                <select x-model="sortOrder" class="border p-1 rounded-md" @change="$refs.searchForm.submit()">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
        </div>

        <!-- Sorting Form -->
        <form x-ref="searchForm" method="GET" action="{{ route('student.index') }}">
            <input type="hidden" name="search" :value="searchTerm">
            <input type="hidden" name="sort" :value="sortBy">
            <input type="hidden" name="order" :value="sortOrder">
        </form>

        @if($students->isEmpty())
        <p class="text-center text-gray-500">No students available.</p>
        @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="w-full border-b">
                    <th class="py-2 px-4 text-left cursor-pointer" @click="toggleSort('student_id')">
                        Student ID
                        <span x-show="sortBy === 'student_id' && sortOrder === 'asc'">▲</span>
                        <span x-show="sortBy === 'student_id' && sortOrder === 'desc'">▼</span>
                    </th>
                    <th class="py-2 px-4 text-left cursor-pointer" @click="toggleSort('name')">
                        Name
                        <span x-show="sortBy === 'name' && sortOrder === 'asc'">▲</span>
                        <span x-show="sortBy === 'name' && sortOrder === 'desc'">▼</span>
                    </th>
                    <th class="py-2 px-4 text-left cursor-pointer" @click="toggleSort('course_name')">
                        Course Name
                        <span x-show="sortBy === 'course_name' && sortOrder === 'asc'">▲</span>
                        <span x-show="sortBy === 'course_name' && sortOrder === 'desc'">▼</span>
                    </th>
                    <th class="py-2 px-4 text-left cursor-pointer" @click="toggleSort('agent')">
                        Agent
                        <span x-show="sortBy === 'agent' && sortOrder === 'asc'">▲</span>
                        <span x-show="sortBy === 'agent' && sortOrder === 'desc'">▼</span>
                    </th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="w-full border-b">
                    <td class="py-2 px-4 whitespace-nowrap">{{ $student->r_id }}</td>
                    <td class="py-2 px-4 whitespace-nowrap">{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td class="py-2 px-4 whitespace-nowrap">{{ $student->course->course_name }}</td>
                    <td class="py-2 px-4 whitespace-nowrap">{{ $student->agent ? $student->agent->name : 'No Agent' }}</td>
                    <td class="py-2 px-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <button
                                class="bg-black text-white py-1 px-3 rounded-lg"
                                @click="selectedUser = {{ $student->toJson() }}; showModal = true">
                                View User
                            </button>
                            <button class="bg-blue-500 text-white py-1 px-3 rounded-lg"
                                @click="selectedUser = {{ $student->toJson() }}; showGenerateModal = true;">
                                Generate Documents
                            </button>
                            <a href="{{ route('student.edit', $student->id) }}" class="bg-gray-300 text-black py-1 px-3 rounded-lg">Edit User</a>
                            <button class="bg-red-500 text-white py-1 px-3 rounded-lg"
                                @click="selectedUser = {{ $student->toJson() }}; showDeleteModal = true">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <p>{{ $students->firstItem() }}-{{ $students->lastItem() }} of {{ $students->total() }}</p>
            <div class="flex space-x-2">
                {{ $students->links() }}
            </div>
        </div>
        @endif
    </div>

    <!-- Generate Documents Modal -->
    <div x-show="showGenerateModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center z-50"
        x-cloak
        @click.away="showGenerateModal = false"
        style="display: none;">

        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-lg relative">
            <!-- Close Button -->
            <button
                @click="showGenerateModal = false"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
                &times;
            </button>

            <!-- Modal Header -->
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Generate Documents</h3>
            <!-- Links to Generate Letters -->
            <div class="space-y-4">
                <a
                    :href="selectedUser ? `{{ route('letters.bank', ':id') }}`.replace(':id', selectedUser.id) : '#'"
                    :class="{ 'opacity-50 pointer-events-none': !selectedUser }"
                    class="text-blue-500 hover:text-blue-700 flex items-center">
                    <span>Download Bank Details Letter</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a
                    :href="selectedUser ? `{{ route('letters.offer', ':id') }}`.replace(':id', selectedUser.id) : '#'"
                    :class="{ 'opacity-50 pointer-events-none': !selectedUser }"
                    class="text-blue-500 hover:text-blue-700 flex items-center">
                    <span>Download Provisional Offer Letter</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a
                    :href="selectedUser ? `{{ route('letters.acceptance', ':id') }}`.replace(':id', selectedUser.id) : '#'"
                    :class="{ 'opacity-50 pointer-events-none': !selectedUser }"
                    class="text-blue-500 hover:text-blue-700 flex items-center">
                    <span>Download Acceptance Letter</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

            <!-- Form to Send Admission Email -->
            <form method="POST" :action="`/emails/admission/${selectedUser.id}`" id="emailForm">
                @csrf
                <label for="emailSelect" class="block text-sm font-medium text-gray-700 mb-2">Select Email Address:</label>
                <select name="email_id" id="emailSelect" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select an email</option>
                    @foreach($availableEmails as $email)
                    <option value="{{ $email->id }}">{{ $email->email }}</option>
                    @endforeach
                </select>

                <button type="submit" class="mt-6 w-full flex items-center justify-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">
                    Send Admission Email
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </form>





        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="showModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center z-50"
        style="display: none;"
        @click.away="showModal = false">

        <div class="bg-white rounded-lg shadow-lg p-8 w-full sm:w-5/6 md:w-2/3 lg:w-1/2 max-h-screen overflow-y-auto relative">
            <!-- Close Button -->
            <button
                @click="showModal = false"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
                &times;
            </button>

            <!-- Header Section -->
            <div class="flex items-center border-b pb-4 mb-6">
                <div>
                    <img
                        :src="'{{ asset('storage') }}/' + selectedUser.student_picture"
                        alt="Student Picture"
                        class="w-24 h-auto rounded-full shadow" />
                </div>
                <div class="ml-6">
                    <h3 class="text-2xl font-semibold text-gray-800" x-text="selectedUser.first_name + ' ' + selectedUser.last_name"></h3>
                    <p class="text-gray-600 mt-1" x-text="'Student ID: ' + selectedUser.r_id"></p>
                </div>
            </div>

            <!-- University Section -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-gray-700 mb-3">University Details</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <strong class="text-gray-700">University:</strong>
                        <p class="text-gray-600" x-text="selectedUser.university_name"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Admission Year:</strong>
                        <p class="text-gray-600" x-text="selectedUser.admission_year"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Course Code:</strong>
                        <p class="text-gray-600" x-text="selectedUser.course_code"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Course Name:</strong>
                        <p class="text-gray-600" x-text="selectedUser.course.course_name"></p>
                    </div>
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-gray-700 mb-3">Personal Information</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <strong class="text-gray-700">Gender:</strong>
                        <p class="text-gray-600" x-text="selectedUser.gender"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Date of Birth:</strong>
                        <p class="text-gray-600" x-text="selectedUser.date_of_birth"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Nationality:</strong>
                        <p class="text-gray-600" x-text="selectedUser.nationality"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Passport Number:</strong>
                        <p class="text-gray-600" x-text="selectedUser.passport_number"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Country:</strong>
                        <p class="text-gray-600" x-text="selectedUser.country"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">City:</strong>
                        <p class="text-gray-600" x-text="selectedUser.city"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Embassy:</strong>
                        <p class="text-gray-600" x-text="selectedUser.embassy"></p>
                    </div>
                </div>
            </div>

            <!-- Additional Details Section -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-gray-700 mb-3">Additional Details</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <strong class="text-gray-700">Bank Name:</strong>
                        <p class="text-gray-600" x-text="selectedUser.bank.bank_name"></p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Agent Name:</strong>
                        <p class="text-gray-600" x-text="selectedUser.agent ? selectedUser.agent.name : 'No Agent Selected'"></p>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div class="text-right">
                <button
                    @click="showModal = false"
                    class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">
                    Close
                </button>
            </div>
        </div>
    </div>




    <!-- Delete Confirmation Modal -->
    <div
        x-show="showDeleteModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center z-50"
        x-cloak
        @click.away="showDeleteModal = false" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
            <!-- Close Button -->
            <button
                @click="showDeleteModal = false"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">
                &times;
            </button>

            <!-- Modal Content -->
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h3>
            <p class="text-gray-600 mb-6">Are you sure you want to delete <strong x-text="selectedUser.first_name + ' ' + selectedUser.last_name"></strong>? This action cannot be undone.</p>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4">
                <button @click="showDeleteModal = false" class="px-4 py-2 bg-gray-300 text-black font-semibold rounded-md shadow hover:bg-gray-400">
                    Cancel
                </button>
                <form :action="'/student/' + selectedUser.id" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md shadow hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- <script>
    function sendEmail(studentId, emailId) {
        if (!studentId || !emailId) {
            alert('Please select both a student and an email address.');
            return;
        }

        fetch(`/letters/send-admission-email/${studentId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    email_id: emailId
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Server Error: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.message) {
                    alert(data.message);
                } else if (data.error) {
                    alert('Error: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong while sending the email.');
            });
    }
</script> -->

@endsection