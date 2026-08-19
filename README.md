# scrape-google-trends-data-with-php
Scrape Google Trends Data With PHP Using the G-Trends API

Learn how to scrape Google Trends data with PHP using the unofficial G-Trends API, process historical trend data and analyse search interest.

You can see the full guide over on my blog, The Digital Den: https://declankay.com/blog/scrape-google-trends-data-with-php-using-the-g-trends-api/

There are three main files in the example folder: (index.php, sample-data-transformations.php and sample-data.json) plus two composer config files (use them to install any packages that G-Trends relies on).

**index.php**

Provide two modes for DEBUG_MODE: false (data is live from G-Trends API) or true (data is from a sample JSON file).

Make a connection to G-Trends with the options:
Keyword: croissants, Country: France, Language: French, Timeframe: 2020-07-01 2026-07-31 (over six years)
The script makes use of the 'Interest Over Time' functionality of Google Trends where you can see the popularity over several years, split out on a monthly basis.

Retrieve the data from the API and convert to a PHP array.
Loop through the array using a foreach loop to display the month date and the month score.
Store the data in an array for use later in sample transformations mentioned below.

**sample-data-transformations.php**

Five handy data transformation examples to understand the dataset more effectively. Either use the examples provided or the examples may inspire solutions of your own. The examples:
1 - Six-Year Average (Median)
2 - Six-Year Average (Mean)
3 - Highest, Lowest and Range Scores
4 - Months Above a Specific Score
5 - Top 5 Months

**sample-data.json**

Sample JSON data sent back from G-Trends using the options set out above under index.php.

**Requirements**
- G-Trends is written in PHP, so our initial request will use that.
- NPM, Node Package Manager, will be required to install some applications.
- G-Trends is installed using Composer, so this will also be needed.
- As a server-side language is used, we will need a virtual server app like WAMP or MAMP.
- Optional – You may want to store the data in a database, so a database app like Medoo could be useful.
