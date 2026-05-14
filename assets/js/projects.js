async function loadProjects() {
    try {
        const response = await fetch('api/get_projects.php');
        const data = await response.json();

        const grid = document.getElementById('projectsGrid');
        grid.innerHTML = '';

        if (data.success && Array.isArray(data.data) && data.data.length > 0) {
            data.data.forEach((project, index) => {
                const card = document.createElement('div');
                card.className = 'project-card';
                card.style.animationDelay = `${index * 0.09}s`;

                const rawStack = project.tech_stack != null ? String(project.tech_stack) : '';
                const tags = rawStack
                    .split(',')
                    .map((t) => `<span class="tag">${t.trim()}</span>`)
                    .join('');

                const github = project.github_url != null ? project.github_url : '#';

                card.innerHTML = `
                    <h3>${project.title}</h3>
                    <p>${project.description}</p>
                    <div class="tech-tags">${tags}</div>
                    <a href="${github}" target="_blank" rel="noopener noreferrer">View on GitHub →</a>
                `;
                grid.appendChild(card);
            });
        } else {
            grid.innerHTML = '<p style="color:var(--text-muted)">No projects yet.</p>';
        }
    } catch (err) {
        document.getElementById('projectsGrid').innerHTML =
            '<p style="color:#ff6b6b">Could not load projects.</p>';
    }
}

loadProjects();
