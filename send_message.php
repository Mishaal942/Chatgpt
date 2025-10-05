<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = strtolower(trim($_POST['message']));
    $response = "";

    // Smart & Broad Knowledge Responses
    if (str_contains($input, "who are you")) {
        $response = "I'm your smart AI assistant 🤖. I know about sports, technology, food, languages, famous people, and more! How can I help you today?";
    } elseif (str_contains($input, "how are you")) {
        $response = "I'm great! 😄 Ready to chat. How about you? What can I help you with?";
    } elseif (str_contains($input, "introduce") && str_contains($input, "myself")) {
        $response = "Sure! Please tell me your name, where you're from, and your favorite hobbies 😊";
    } elseif (str_contains($input, "ai") || str_contains($input, "artificial intelligence")) {
        $response = "AI stands for Artificial Intelligence. It helps machines think and act smart — like me! 🤖 Used in chatbots, self-driving cars, and even hospitals.";
    } elseif (str_contains($input, "technology")) {
        $response = "Technology means using science to solve problems. It includes mobile phones, internet, computers, AI, and even smart homes!";
    } elseif (str_contains($input, "sports")) {
        $response = "Sports keep us active and healthy! Popular games include football, cricket, tennis, badminton, and basketball 🏏⚽️🎾";
    } elseif (str_contains($input, "school")) {
        $response = "School is a place to learn, grow, and prepare for life. It's where students gain knowledge and make friends! 📚";
    } elseif (str_contains($input, "language")) {
        $response = "I can understand English, Urdu, Hindi, French, Spanish, Arabic, and more! 🌐 Which one do you prefer?";
    } elseif (str_contains($input, "food") || str_contains($input, "cuisine")) {
        $response = "Delicious! 🍕 Pakistani: Biryani, Nihari. Indian: Dosa, Paneer. Italian: Pizza. Chinese: Noodles. Ask me about any!";
    } elseif (str_contains($input, "countries")) {
        $response = "There are 195 countries! 🌍 Popular ones: USA, India, Pakistan, Japan, France. I can tell you about any one!";
    } elseif (str_contains($input, "actor") || str_contains($input, "actress")) {
        $response = "Bollywood: Shah Rukh Khan, Deepika Padukone. Hollywood: Tom Cruise, Emma Watson 🎬 Want to know about any?";
    } elseif (str_contains($input, "religion")) {
        $response = "There are many religions in the world including Islam, Christianity, Hinduism, Buddhism. Each has unique beliefs 🌸";
    } elseif (str_contains($input, "weather")) {
        $response = "Weather changes every day! ☀️🌧️☁️ It's sunny, rainy, or cold depending on your location. Want current weather?";
    } elseif (str_contains($input, "science")) {
        $response = "Science helps us understand the world 🌎 It includes physics, chemistry, biology, and experiments!";
    } elseif (str_contains($input, "history")) {
        $response = "History tells us about the past — kings, wars, revolutions, and ancient civilizations like Egypt and Indus Valley 🏛️";
    } elseif (str_contains($input, "math")) {
        $response = "Math is everywhere! 🧮 From counting and algebra to geometry and data science. Need help solving something?";
    } elseif (str_contains($input, "hobby") || str_contains($input, "hobbies")) {
        $response = "Popular hobbies include reading, painting, sports, gaming, coding, gardening 🌿 What's your hobby?";
    } elseif (str_contains($input, "travel") || str_contains($input, "visit")) {
        $response = "Traveling is fun! 🧳 You can visit cities like Paris, Dubai, Istanbul, Tokyo, or explore nature and mountains!";
    } elseif (str_contains($input, "music")) {
        $response = "Music is the soul! 🎶 Do you like pop, classical, folk, or rap? Singers like Arijit Singh, Atif Aslam, and Billie Eilish are popular.";
    } elseif (str_contains($input, "game")) {
        $response = "Games are fun! 🎮 You can play PUBG, Fortnite, Minecraft, or mobile games like Candy Crush. Want game tips?";
    } elseif (str_contains($input, "what can you do")) {
        $response = "I can answer your questions, help you learn, chat about food, sports, tech, AI, history, countries, and more! ✨";
    } elseif (str_contains($input, "goodbye") || str_contains($input, "bye")) {
        $response = "Goodbye! 👋 Come back anytime. I'll be here waiting to help!";
    } else {
        $response = "That's interesting! Tell me more or ask about sports, school, food, tech, languages, or any country 😊";
    }

    echo $response;
}
?>
