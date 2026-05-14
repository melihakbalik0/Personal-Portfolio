<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { background:#0A192F; color:#CCD6F6; font-family:'Poppins',sans-serif; }
        .topbar {
            background:#112240;
            padding:1rem 2rem;
            display:flex;
            justify-content:space-between;
            align-items:center;
            border-bottom:1px solid rgba(100,255,218,0.1);
        }
        .topbar h1 { color:#64FFDA; font-size:1.2rem; }
        .topbar a {
            color:#ff6b6b;
            text-decoration:none;
            font-size:0.9rem;
            border:1px solid #ff6b6b;
            padding:0.4rem 1rem;
            border-radius:5px;
            transition:all 0.3s;
        }
        .topbar a:hover { background:#ff6b6b; color:#0A192F; }
        .container { max-width:1100px; margin:0 auto; padding:2rem; }
        h2 { color:#E6F1FF; font-size:1.2rem; margin-bottom:1.5rem; border-left:3px solid #64FFDA; padding-left:0.8rem; }
        table { width:100%; border-collapse:collapse; margin-bottom:3rem; }
        th { background:#112240; color:#64FFDA; padding:0.8rem; text-align:left; font-size:0.85rem; }
        td { padding:0.8rem; border-bottom:1px solid rgba(100,255,218,0.1); color:#8892B0; font-size:0.85rem; }
        tr.unread td { color:#CCD6F6; background:rgba(100,255,218,0.03); }
        .btn {
            padding:0.3rem 0.8rem;
            border-radius:5px;
            border:none;
            cursor:pointer;
            font-size:0.8rem;
            transition:all 0.3s;
        }
        .btn-read { background:rgba(100,255,218,0.1); color:#64FFDA; border:1px solid #64FFDA; }
        .btn-delete { background:rgba(255,107,107,0.1); color:#ff6b6b; border:1px solid #ff6b6b; }
        .form-box {
            background:#112240;
            padding:1.5rem;
            border-radius:10px;
            margin-bottom:3rem;
            border:1px solid rgba(100,255,218,0.1);
        }
        .form-box input, .form-box textarea {
            width:100%;
            padding:0.8rem;
            margin-bottom:1rem;
            background:#0A192F;
            border:1px solid rgba(100,255,218,0.2);
            border-radius:5px;
            color:#CCD6F6;
            font-family:'Poppins',sans-serif;
            font-size:0.85rem;
            outline:none;
        }
        .form-box input:focus, .form-box textarea:focus { border-color:#64FFDA; }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:1rem; }
        .btn-submit {
            padding:0.8rem 2rem;
            background:transparent;
            border:2px solid #64FFDA;
            color:#64FFDA;
            border-radius:5px;
            cursor:pointer;
            font-family:'Poppins',sans-serif;
            transition:all 0.3s;
        }
        .btn-submit:hover { background:#64FFDA; color:#0A192F; }
        #statusMsg {
            margin-top:1rem;
            padding:0.8rem;
            border-radius:5px;
            display:none;
            text-align:center;
        }
        .success { background:rgba(100,255,218,0.1); color:#64FFDA; display:block !important; }
        .error { background:rgba(255,107,107,0.1); color:#ff6b6b; display:block !important; }
    </style>
</head>
<body>
    <div class="topbar">
        <h1>⚡ Admin Dashboard</h1>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">

        <!-- MESSAGES SECTION -->
        <h2>📬 Incoming Messages</h2>
        <table id="messagesTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="messagesList"></tbody>
        </table>

        <!-- PROJECTS SECTION -->
        <h2>🚀 Projects</h2>
        <table id="projectsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Technologies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="projectsList"></tbody>
        </table>

        <!-- ADD NEW PROJECT SECTION -->
        <h2>➕ Add New Project</h2>
        <div class="form-box">
            <div class="form-row">
                <input type="text" id="pTitle" placeholder="Project Title" />
                <input type="text" id="pCategory" placeholder="Category (e.g., Machine Learning)" />
            </div>
            <textarea id="pDesc" placeholder="Project Description" rows="3"></textarea>
            <div class="form-row">
                <input type="text" id="pTech" placeholder="Technologies (e.g., Python, Scikit-learn)" />
                <input type="text" id="pGithub" placeholder="GitHub URL" />
            </div>
            <button class="btn-submit" onclick="addProject()">Add Project</button>
            <div id="statusMsg"></div>
        </div>

    </div>

    <script>
        // Fetch and display messages from database
        async function loadMessages() {
            const res = await fetch('../api/get_messages.php');
            const data = await res.json();
            const tbody = document.getElementById('messagesList');
            tbody.innerHTML = '';
            data.data.forEach(m => {
                const tr = document.createElement('tr');
                if (m.is_read == 0) tr.classList.add('unread');
                tr.innerHTML = `
                    <td>${m.id}</td>
                    <td>${m.name}</td>
                    <td>${m.email}</td>
                    <td>${m.subject}</td>
                    <td>${m.submitted_at}</td>
                    <td>
                        ${m.is_read == 0 ? `<button class="btn btn-read" onclick="markRead(${m.id})">Mark as Read</button>` : '✓ Read'}
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Fetch and display projects from database
        async function loadProjects() {
            const res = await fetch('../api/get_projects.php');
            const data = await res.json();
            const tbody = document.getElementById('projectsList');
            tbody.innerHTML = '';
            data.data.forEach(p => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${p.id}</td>
                    <td>${p.title}</td>
                    <td>${p.category}</td>
                    <td>${p.tech_stack}</td>
                    <td>
                        <button class="btn btn-delete" onclick="deleteProject(${p.id})">Delete</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Update message status to read
        async function markRead(id) {
            await fetch('../api/edit_project.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ action: 'mark_read', id })
            });
            loadMessages();
        }

        // Remove project from database
        async function deleteProject(id) {
            if (!confirm('Are you sure you want to delete this project?')) return;
            await fetch('../api/edit_project.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ action: 'delete', id })
            });
            loadProjects();
        }

        // Submit new project data
        async function addProject() {
            const title = document.getElementById('pTitle').value.trim();
            const category = document.getElementById('pCategory').value.trim();
            const description = document.getElementById('pDesc').value.trim();
            const tech_stack = document.getElementById('pTech').value.trim();
            const github_url = document.getElementById('pGithub').value.trim();

            if (!title || !description || !tech_stack || !category) {
                showStatus('Please fill in all required fields!', 'error');
                return;
            }

            const res = await fetch('../api/add_project.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ title, category, description, tech_stack, github_url })
            });
            const data = await res.json();

            if (data.success) {
                showStatus('Project added successfully!', 'success');
                loadProjects();
                document.getElementById('pTitle').value = '';
                document.getElementById('pCategory').value = '';
                document.getElementById('pDesc').value = '';
                document.getElementById('pTech').value = '';
                document.getElementById('pGithub').value = '';
            } else {
                showStatus('An error occurred while adding the project!', 'error');
            }
        }

        // Display status feedback to user
        function showStatus(msg, type) {
            const el = document.getElementById('statusMsg');
            el.textContent = msg;
            el.className = type;
        }

        // Initial load
        loadMessages();
        loadProjects();
    </script>
</body>
</html>