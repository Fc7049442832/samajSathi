<div class="search-section">
    <div class="overlay">
      <h3 class="mb-4">Someone Somewhere is Dreaming of You</h3>

      <form class="search-form">
        <div class="form-group">
          <label for="looking-for">Looking for</label>
          <select id="looking-for" name="looking-for">
            <option value="female">Female</option>
            <option value="male">Male</option>
          </select>
        </div>

        <div class="form-group">
          <label for="age">Mini Age</label>
          <select name="" id="">
            @for ($i = 18; $i <= 45; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
        <span>To</span>
        <div class="form-group">
          <label for="age">Max Age</label>
          <select name="" id="">
            @for ($i = 21; $i <= 50; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
         
        <div class="form-group">
          <label for="religion">Religion</label>
          <select id="religion" name="religion">
            <option value="any">Any</option>
            <option value="hindu">Hindu</option>
            <option value="muslim">Muslim</option>
            <option value="christian">Christian</option>
          </select>
        </div>

        <button type="submit" class="search-button ">Search Partner</button>
      </form>
    </div>
</div>

<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
  
    .overlay {
      background-color: rgb(0 0 0 / 62%);
      padding: 20px; /* Reduced padding */
      border-radius: 10px;
      text-align: center;
      color: white;
      max-width: 100%;
      margin-top: -80px; /* Adjusted margin for smaller screens */
      width: 90%; /* Slightly narrower for mobile screens */
      border: 2px solid white; /* Slightly thinner border */
    }
  
    .search-section {
      width: auto;
      position: relative;
      background: url('background.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  
    h1{
      margin-bottom: 15px; /* Reduced margin */
      font-size: 20px; /* Reduced font size */
    }
  
    h3 {
      font-size: 2rem; /* Reduced font size */
      margin-bottom: 15px; /* Reduced margin */
    }
  
    .search-form {
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: center;
      gap: 10px; /* Reduced gap between form elements */
    }
  
    .form-group {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  
    select {
      padding: 8px; /* Reduced padding */
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 18px; /* Reduced font size */
    }
  
    input[type="number"] {
      width: 60px; /* Reduced width */
      text-align: center;
    }
  
    .search-button {
      margin: 10px 5px 5px 30px; /* Reduced margins */
      padding: 5px 15px; /* Reduced padding */
      background-color: #e74c3c;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 14px; /* Reduced font size */
      cursor: pointer;
    }
  
    .search-button:hover {
      background-color: #c0392b;
    }
  
    span {
      margin: 15px 5px; /* Reduced margin */
      font-size: 14px; /* Reduced font size */
      color: white;
    }
  
    /* Media query for smaller screens */
    @media (max-width: 600px) {
      .overlay {
        margin-top: -50px; /* Adjusted for smaller screens */
        width: 95%;
        padding: 15px; /* Further reduced padding */
      }
  
      h3 {
        font-size: 16px; /* Further reduced font size */
      }

      label{
        font-size: 12px; /* Further reduced font size */
      }
  
      .search-form {
        gap: 8px; /* Further reduced gap */
      }
  
      select {
        padding: 6px; /* Further reduced padding */
        font-size: 10px; /* Further reduced font size */
      }
  
      .search-button {
        padding: 4px 10px; /* Further reduced padding */
        font-size: 12px; /* Further reduced font size */
      }
  
      span {
        font-size: 12px; /* Further reduced font size */
      }
    }
  </style>
  