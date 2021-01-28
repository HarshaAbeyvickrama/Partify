<?php
    include('../Includes/header.php');
    include('../Includes/navbar.php');
?>
    <div class="container">
        <form action="../Controls/userControl.php" method="post">
            <div class="section">
                <div class="title">Update Event</div>
                <div class="label">Event Name</div>
                <input type="text" name="eventName" id="eventName" class="input" required>
                <div class="label">Event Type</div>
                <select name="eventType" id="eventType" class="select" required>
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
                <div class="label">Event Location</div>
                <input type="text" name="eventLocation" id="eventLocation" class="input">
                <div class="label">Event Date</div>
                <input type="date" name="eventDate" id="eventDate" class="dateTime">
                <div class="label">Time</div>
                <span class="span">From</span>
                <input type="time" class="dateTime" name="startTime">
                <span class="span">To</span>
                <input type="time" class="dateTime" name="endTime">
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needMeal" id="needMeal" class="box" onchange="displaySection('secMeal','needMeal')">
                    <span class="span">Meals</span>
            </div>
            <div class="section secMeal" id="secMeal">
                <div class="label">Select Catering Service</div>
                <select name="cateringService" id="cateringService" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
                <div class="label">Select Meal</div>
                <select name="mealType" id="mealType" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needPhotography" id="needPhotography" class="box" onchange="displaySection('secPhotography','needPhotography')">
                    <span class="span">Photography</span>
                </div>
            <div class="section secPhotography" id="secPhotography">
                <div class="label">Select Photographer</div>
                <select name="photographer" id="photographer" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
                <div class="label">Select Package</div>
                <select name="photographyPackage" id="photographyPackage" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needVideography" id="needVideography" class="box" onchange="displaySection('secVideography','needVideography')">
                    <span class="span">Videography</span>
                </div>
            <div class="section secVideography" id="secVideography">
                <div class="label">Select Videographer</div>
                <select name="videographer" id="videographer" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
                <div class="label">Select Package</div>
                <select name="videographyPackage" id="videographyPackage" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needDecoration" id="needDecoration" class="box" onchange="displaySection('secDecoration','needDecoration')">
                    <span class="span">Decorations</span>
                </div>
            <div class="section secDecoration" id="secDecoration">
                <div class="label">Select Decorator</div>
                <select name="decorator" id="decorator" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
                <div class="label">Select Package</div>
                <select name="decoratorPackage" id="decoratorPackage" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                </select>
            </div>
            <div class="btnSubmit">
                <button type="submit" name="btnBookEvent">Book Event</button>
            </div>
        </form>
        
    </div>
</body>
</html>