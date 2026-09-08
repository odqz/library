<x-layout.layout>
    <div class="flex flex-col">
        <p>Yo, so this is the plan</p>
        <p>=============================================</p>
        <p>When a user adds a manga to their shelf</p>
        <p>- Clicking on the add to shelf button will send a create post request to manga controller</p>
        <p>- Then user goes to another page where they do reading status, chapter, volumes, etc</p>
        <p>- Then clicking on submit sends a create post request to reading controller</p>
        <p>=============================================</p>
        <p>When a user goes to the shelf page</p>
        <p>- It sends a get request to the user#show</p>
        <p>- User show page gets the users anime and manga</p>
    </div>
</x-layout.layout>
