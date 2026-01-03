<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">Instagram</div>
            <div class="search-box">
                <input type="text" placeholder="Search">
            </div>
            <div class="nav-icons">
                <span>🏠</span>
                <span>💬</span>
                <span>➕</span>
                <span>🧭</span>
                <span>❤️</span>
                <div class="profile-pic"></div>
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="feed">
            <div class="stories">
                <div class="story">
                    <div class="story-ring">
                        <div class="story-pic"></div>
                    </div>
                    <div class="story-username">your_story</div>
                </div>
                <div class="story">
                    <div class="story-ring">
                        <div class="story-pic"></div>
                    </div>
                    <div class="story-username">user123</div>
                </div>
                <div class="story">
                    <div class="story-ring">
                        <div class="story-pic"></div>
                    </div>
                    <div class="story-username">traveler</div>
                </div>
                <div class="story">
                    <div class="story-ring">
                        <div class="story-pic"></div>
                    </div>
                    <div class="story-username">foodie</div>
                </div>
                <div class="story">
                    <div class="story-ring">
                        <div class="story-pic"></div>
                    </div>
                    <div class="story-username">photographer</div>
                </div>
                <div class="story">
                    <div class="story-ring">
                        <div class="story-pic"></div>
                    </div>
                    <div class="story-username">artist_101</div>
                </div>
            </div>

            <div id="posts"></div>
        </div>

        <div class="sidebar">
            <div class="user-profile">
                <div class="user-profile-pic"></div>
                <div class="user-info">
                    <div class="user-name">your_username</div>
                    <div class="user-full-name">Your Full Name</div>
                </div>
                <button class="switch-btn">Switch</button>
            </div>

            <div class="suggestions">
                <div class="suggestions-header">
                    <div class="suggestions-title">Suggestions For You</div>
                    <div class="see-all">See All</div>
                </div>
                <div class="suggestion-item">
                    <div class="suggestion-pic"></div>
                    <div class="suggestion-info">
                        <div class="suggestion-username">user_456</div>
                        <div class="suggestion-reason">Followed by user123</div>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="suggestion-item">
                    <div class="suggestion-pic"></div>
                    <div class="suggestion-info">
                        <div class="suggestion-username">cool_pics</div>
                        <div class="suggestion-reason">Popular</div>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="suggestion-item">
                    <div class="suggestion-pic"></div>
                    <div class="suggestion-info">
                        <div class="suggestion-username">nature_lover</div>
                        <div class="suggestion-reason">Followed by traveler</div>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
            </div>

            <div class="footer">
                © 2026 Instagram Clone
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>