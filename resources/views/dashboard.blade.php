<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body>
    <h1 class="text-3xl font-bold text-center mb-10">Hello World from Dashboard!</h1>
    <main>
        <table id="dashboard" class="w-full">
        </table>
    </main>
    <script>
        const $dashboard = document.getElementById('dashboard');

        $dashboard.innerHTML = 'Loading...';

        const data = fetch('http://127.0.0.1:8000/api/students')
            .then(response => {
                if(!response.ok)
                    throw new Error(response.statusText);
                return response.json();
            })
            .then(displayStudents)
            .catch(err => {
                // Display a text with the error
                $dashboard.innerHTML = err.message; 
            });

        function createHeaders(keys){
            const $thead = document.createElement('thead');
            const $tr = document.createElement('tr');
            $dashboard.appendChild($thead);
            $thead.appendChild($tr);

            keys.forEach(key => {
                $tr.innerHTML += `
                    <th>${key}</th>
                `;
            });
        }

        function displayStudents(students){
            $dashboard.innerHTML = '';

            createHeaders(Object.keys(students[0]));

            const $tbody = document.createElement('tbody');
            $dashboard.appendChild($tbody);

            students.forEach(student => {
                $tbody.innerHTML += `
                    <tr>
                        <td>${student.id}</td>
                        <td>${student.name}</td>
                        <td>${student.email}</td>
                        <td>${student.phone}</td>
                        <td>${student.language}</td>
                        <td>${student.created_at}</td>
                        <td>${student.updated_at}</td>
                    </tr>
                `;
            });
        };
    </script>
</body>

</html>