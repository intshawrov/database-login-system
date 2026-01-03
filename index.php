<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #fafafa;
        }

        .header {
            background-color: #fff;
            border-bottom: 1px solid #dbdbdb;
            padding: 12px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
        }

        .header-content {
            max-width: 975px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Dancing Script', cursive;
            font-size: 28px;
            font-weight: bold;
        }

        .search-box {
            background-color: #efefef;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            padding: 8px 16px;
            width: 268px;
        }

        .search-box input {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
        }

        .nav-icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-icons span {
            cursor: pointer;
            font-size: 24px;
        }

        .profile-pic {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .main-container {
            max-width: 975px;
            margin: 80px auto 0;
            display: flex;
            gap: 30px;
            padding: 20px;
        }

        .feed {
            flex: 1;
            max-width: 614px;
        }

        .stories {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            gap: 16px;
            overflow-x: auto;
        }

        .story {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            min-width: 66px;
        }

        .story-ring {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .story-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #e1e1e1;
            border: 3px solid #fff;
        }

        .story-username {
            font-size: 12px;
            max-width: 66px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .post {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .post-header {
            display: flex;
            align-items: center;
            padding: 14px 16px;
            gap: 12px;
        }

        .post-profile-pic {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #e1e1e1;
        }

        .post-username {
            font-weight: 600;
            font-size: 14px;
            flex: 1;
        }

        .post-options {
            cursor: pointer;
            font-size: 20px;
        }

        .post-image {
            width: 100%;
            height: 614px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
        }

        .post-actions {
            display: flex;
            padding: 12px 16px;
            gap: 16px;
            align-items: center;
        }

        .action-btn {
            cursor: pointer;
            font-size: 24px;
            background: none;
            border: none;
        }

        .action-btn.like {
            transition: transform 0.2s;
        }

        .action-btn.like.liked {
            color: #ed4956;
        }

        .action-btn.like:active {
            transform: scale(1.2);
        }

        .save-btn {
            margin-left: auto;
        }

        .post-likes {
            padding: 0 16px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .post-caption {
            padding: 0 16px;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .post-caption .username {
            font-weight: 600;
            margin-right: 6px;
        }

        .post-time {
            padding: 0 16px 12px;
            font-size: 10px;
            color: #8e8e8e;
            text-transform: uppercase;
        }

        .sidebar {
            width: 319px;
            position: sticky;
            top: 90px;
            height: fit-content;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .user-profile-pic {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: #e1e1e1;
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-full-name {
            font-size: 14px;
            color: #8e8e8e;
        }

        .switch-btn {
            color: #0095f6;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            background: none;
            border: none;
        }

        .suggestions {
            margin-bottom: 24px;
        }

        .suggestions-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .suggestions-title {
            font-weight: 600;
            font-size: 14px;
            color: #8e8e8e;
        }

        .see-all {
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .suggestion-pic {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #e1e1e1;
        }

        .suggestion-info {
            flex: 1;
        }

        .suggestion-username {
            font-weight: 600;
            font-size: 14px;
        }

        .suggestion-reason {
            font-size: 12px;
            color: #8e8e8e;
        }

        .follow-btn {
            color: #0095f6;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            background: none;
            border: none;
        }

        .footer {
            margin-top: 32px;
            color: #c7c7c7;
            font-size: 11px;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .feed {
                max-width: 100%;
            }
        }
    </style>
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