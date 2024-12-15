// Static food data
const foods = [
    { name: "Pizza", type: "non-veg", rating: 8 },
    { name: "Salad", type: "veg", rating: 7 },
    { name: "Burger", type: "non-veg", rating: 6 },
    { name: "Pasta", type: "veg", rating: 9 },
    { name: "Sushi", type: "non-veg", rating: 10 },
    { name: "Soup", type: "veg", rating: 7 },
    { name: "Fries", type: "veg", rating: 7 },
    { name: "Steak", type: "non-veg", rating: 9 },
    { name: "biryani", type: "veg", rating: 9 },
    { name: "biryani", type: "non-veg", rating: 7 },
    { name: "tacos", type: "veg", rating: 9 },
    { name: "tacos", type: "non-veg", rating: 7 },
    { name: "spaghetti", type: "veg", rating: 9 },
    { name: "scollaps", type: "non-veg", rating: 10 },
];

// Update the rating value display
function updateRating() {
    const ratingValue = document.getElementById("ratingSlider").value;
    document.getElementById("ratingValue").textContent = ratingValue;
    filterFoods();
}

// Filter foods based on search query, preference, and rating
function filterFoods() {
    const searchQuery = document.getElementById("searchInput").value.toLowerCase();
    const preference = document.querySelector('input[name="preference"]:checked')?.value || "";
    const rating = parseInt(document.getElementById("ratingSlider").value);

    // Exact matches
    const exactMatches = foods.filter(food => {
        const isNameMatch = food.name.toLowerCase().includes(searchQuery);
        const isPreferenceMatch = preference ? food.type === preference : true;
        const isRatingMatch = food.rating >= rating;
        return isNameMatch && isPreferenceMatch && isRatingMatch;
    });

    // Suggestions: Foods that partially match the search query or are near the rating
    const suggestions = foods.filter(food => {
        const isNamePartialMatch = searchQuery && food.name.toLowerCase().includes(searchQuery);
        const isRatingClose = Math.abs(food.rating - rating) <= 2; // Within 2 points of the desired rating
        const isPreferenceSuggestion = preference ? food.type === preference : true;
        return !exactMatches.includes(food) && (isNamePartialMatch || isRatingClose) && isPreferenceSuggestion;
    });

    displayRecommendations(exactMatches, suggestions);
}

// Display the filtered food recommendations and suggestions
function displayRecommendations(exactMatches, suggestions) {
    const recommendationsList = document.getElementById("recommendationsList");
    recommendationsList.innerHTML = ""; // Clear previous results

    if (exactMatches.length === 0 && suggestions.length === 0) {
        recommendationsList.innerHTML = "<li>No foods match your criteria.</li>";
        return;
    }

    if (exactMatches.length > 0) {
        const exactHeader = document.createElement("li");
        exactHeader.textContent = "Exact Matches:";
        recommendationsList.appendChild(exactHeader);

        exactMatches.forEach(food => {
            const listItem = document.createElement("li");
            listItem.textContent = `${food.name} (${food.type}), Rating: ${food.rating}`;
            recommendationsList.appendChild(listItem);
        });
    }

    if (suggestions.length > 0) {
        const suggestionHeader = document.createElement("li");
        suggestionHeader.textContent = "Suggestions:";
        recommendationsList.appendChild(suggestionHeader);

        suggestions.forEach(food => {
            const listItem = document.createElement("li");
            listItem.textContent = `${food.name} (${food.type}), Rating: ${food.rating}`;
            recommendationsList.appendChild(listItem);
        });
    }
}

// Initial call to display all foods
filterFoods();