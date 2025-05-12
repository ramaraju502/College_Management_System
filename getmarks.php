<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marksheet Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .marksheet-container {
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.5s ease;
        }
        .marksheet-container.show {
            transform: scale(1);
            opacity: 1;
        }
        .subject-row:hover {
            background-color: rgba(59, 130, 246, 0.05);
            transform: translateX(5px);
        }
        .grade-A { background-color: #10B981; }
        .grade-B { background-color: #3B82F6; }
        .grade-C { background-color: #F59E0B; }
        .grade-D { background-color: #EF4444; }
        .grade-F { background-color: #6B7280; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <!-- Roll Number Input Section -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8 transition-all duration-300 hover:shadow-xl">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">
                <i class="fas fa-graduation-cap mr-2"></i> Student Marksheet Portal
            </h1>
            
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <div class="w-full md:w-2/3">
                    <label for="rollNumber" class="block text-lg font-medium text-gray-700 mb-2">
                        Enter Your Roll Number
                    </label>
                    <div class="relative">
                        <input type="text" id="rollNumber" 
                               class="w-full px-6 py-4 border-2 border-blue-300 rounded-xl text-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all"
                               placeholder="e.g. 2023CS101">
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <i class="fas fa-search text-blue-400 text-xl"></i>
                        </div>
                    </div>
                </div>
                <button id="fetchMarksheet" 
                        class="mt-4 md:mt-7 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md">
                    Get Marksheet <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>

        <!-- Marksheet Display Section (Initially Hidden) -->
        <div id="marksheetContainer" class="marksheet-container bg-white rounded-xl shadow-2xl overflow-hidden">
            <!-- Marksheet Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold">UNIVERSITY OF TECHNOLOGY</h2>
                        <p class="text-blue-100">Official Academic Transcript</p>
                    </div>
                    <div class="mt-4 md:mt-0 text-center md:text-right">
                        <div class="bg-white text-blue-800 px-4 py-2 rounded-lg inline-block">
                            <span class="font-bold">Roll No:</span> 
                            <span id="displayRollNo" class="font-mono">2023CS101</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Details -->
            <div class="p-6 border-b">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-gray-500 text-sm">Student Name</p>
                        <p id="studentName" class="font-bold text-lg">John Doe</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Program</p>
                        <p id="program" class="font-bold text-lg">B.Tech Computer Science</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Semester</p>
                        <p id="semester" class="font-bold text-lg">4th Semester</p>
                    </div>
                </div>
            </div>

            <!-- Marks Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Marks</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Max Marks</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody id="marksTable" class="divide-y divide-gray-200">
                        <!-- Subjects will be added here by JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="p-6 bg-gray-50">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-gray-500">Total Marks</p>
                        <p id="totalMarks" class="text-2xl font-bold text-blue-600">385</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-gray-500">Percentage</p>
                        <p id="percentage" class="text-2xl font-bold text-green-600">77%</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-gray-500">CGPA</p>
                        <p id="cgpa" class="text-2xl font-bold text-purple-600">7.7</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-gray-500">Result</p>
                        <p id="result" class="text-2xl font-bold text-green-600">PASS</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-4 bg-gray-100 text-center text-sm text-gray-600">
                <p>This is a computer generated document and does not require signature</p>
                <p class="mt-1">© 2023 University of Technology. All Rights Reserved.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rollNumberInput = document.getElementById('rollNumber');
            const fetchButton = document.getElementById('fetchMarksheet');
            const marksheetContainer = document.getElementById('marksheetContainer');
            const marksTable = document.getElementById('marksTable');
            
            // Sample data for demonstration
            const sampleData = {
                '2023CS101': {
                    name: 'John Doe',
                    program: 'B.Tech Computer Science',
                    semester: '4th Semester',
                    subjects: [
                        { name: 'Data Structures', marks: 85, maxMarks: 100, grade: 'A' },
                        { name: 'Database Systems', marks: 78, maxMarks: 100, grade: 'B' },
                        { name: 'Operating Systems', marks: 65, maxMarks: 100, grade: 'C' },
                        { name: 'Computer Networks', marks: 72, maxMarks: 100, grade: 'B' },
                        { name: 'Software Engineering', marks: 85, maxMarks: 100, grade: 'A' }
                    ],
                    totalMarks: 385,
                    percentage: 77,
                    cgpa: 7.7,
                    result: 'PASS'
                },
                '2023CS102': {
                    name: 'Jane Smith',
                    program: 'B.Tech Computer Science',
                    semester: '4th Semester',
                    subjects: [
                        { name: 'Data Structures', marks: 92, maxMarks: 100, grade: 'A' },
                        { name: 'Database Systems', marks: 88, maxMarks: 100, grade: 'A' },
                        { name: 'Operating Systems', marks: 76, maxMarks: 100, grade: 'B' },
                        { name: 'Computer Networks', marks: 81, maxMarks: 100, grade: 'A' },
                        { name: 'Software Engineering', marks: 89, maxMarks: 100, grade: 'A' }
                    ],
                    totalMarks: 426,
                    percentage: 85.2,
                    cgpa: 8.5,
                    result: 'PASS'
                }
            };

            fetchButton.addEventListener('click', function() {
                const rollNumber = rollNumberInput.value.trim();
                
                if (rollNumber === '') {
                    alert('Please enter a roll number');
                    return;
                }
                
                // Check if roll number exists in our sample data
                if (sampleData[rollNumber]) {
                    const studentData = sampleData[rollNumber];
                    
                    // Update student details
                    document.getElementById('displayRollNo').textContent = rollNumber;
                    document.getElementById('studentName').textContent = studentData.name;
                    document.getElementById('program').textContent = studentData.program;
                    document.getElementById('semester').textContent = studentData.semester;
                    
                    // Update marks table
                    marksTable.innerHTML = '';
                    studentData.subjects.forEach(subject => {
                        const row = document.createElement('tr');
                        row.className = 'subject-row transition-all duration-200';
                        row.innerHTML = `
                            <td class="px-6 py-4 whitespace-nowrap font-medium">${subject.name}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">${subject.marks}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">${subject.maxMarks}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="grade-${subject.grade} text-white px-3 py-1 rounded-full text-sm font-bold">${subject.grade}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="text-green-600 font-bold">PASS</span>
                            </td>
                        `;
                        marksTable.appendChild(row);
                    });
                    
                    // Update summary
                    document.getElementById('totalMarks').textContent = studentData.totalMarks;
                    document.getElementById('percentage').textContent = studentData.percentage + '%';
                    document.getElementById('cgpa').textContent = studentData.cgpa;
                    document.getElementById('result').textContent = studentData.result;
                    
                    // Show marksheet with animation
                    marksheetContainer.classList.add('show');
                    
                    // Scroll to marksheet
                    setTimeout(() => {
                        marksheetContainer.scrollIntoView({ behavior: 'smooth' });
                    }, 500);
                } else {
                    alert('No marksheet found for this roll number');
                }
            });

            // Allow pressing Enter key to fetch marksheet
            rollNumberInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    fetchButton.click();
                }
            });
        });
    </script>
</body>
</html>