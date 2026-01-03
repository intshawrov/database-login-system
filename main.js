const posts = [
            { username: 'photographer_pro', likes: 1234, caption: 'Stunning sunset from yesterday 🌅', time: '2 hours ago' },
            { username: 'foodie_delights', likes: 892, caption: 'Best pasta in town! 🍝', time: '5 hours ago' },
            { username: 'travel_diaries', likes: 2156, caption: 'Exploring new horizons ✈️', time: '8 hours ago' }
        ];

        const postsContainer = document.getElementById('posts');

        posts.forEach((post, index) => {
            const postElement = document.createElement('div');
            postElement.className = 'post';
            postElement.innerHTML = `
                <div class="post-header">
                    <div class="post-profile-pic"></div>
                    <div class="post-username">${post.username}</div>
                    <div class="post-options">⋯</div>
                </div>
                <div class="post-image">📷 Photo ${index + 1}</div>
                <div class="post-actions">
                    <button class="action-btn like" onclick="toggleLike(this, ${index})">♡</button>
                    <button class="action-btn">💬</button>
                    <button class="action-btn">✈️</button>
                    <button class="action-btn save-btn">🔖</button>
                </div>
                <div class="post-likes">${post.likes.toLocaleString()} likes</div>
                <div class="post-caption">
                    <span class="username">${post.username}</span>${post.caption}
                </div>
                <div class="post-time">${post.time}</div>
            `;
            postsContainer.appendChild(postElement);
        });

        function toggleLike(btn, index) {
            btn.classList.toggle('liked');
            const likesElement = btn.closest('.post').querySelector('.post-likes');
            const currentLikes = posts[index].likes;
            
            if (btn.classList.contains('liked')) {
                btn.textContent = '❤️';
                posts[index].likes = currentLikes + 1;
            } else {
                btn.textContent = '♡';
                posts[index].likes = currentLikes - 1;
            }
            
            likesElement.textContent = `${posts[index].likes.toLocaleString()} likes`;
        }