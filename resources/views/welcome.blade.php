<x-layout.layout>
    <div class="flex flex-col">
        <p>Yo, so this is the plan</p>
        <p>=============================================</p>
        <p>When a user adds an anime to their shelf</p>
        <p>- Adds an entry into the watch table and if the anime doesnt exist in the anime table it adds it to the db</p>
        <p>- So a post/store request will be sent to the watch controller</p>
        <p>=============================================</p>
        <p>When a user adds a manga to their shelf</p>
        <p>- Adds an entry into the read table and if the manga doesnt exist in the manga table it adds it to the db</p>
        <p>- So a post/store request will be sent to the read controller</p>
        <p>=============================================</p>
        <p>When a user goes to the shelf page</p>
        <p>- It sends a get request to the user#show</p>
        <p>- User show page gets the users anime and manga</p>
    </div>
</x-layout.layout>
