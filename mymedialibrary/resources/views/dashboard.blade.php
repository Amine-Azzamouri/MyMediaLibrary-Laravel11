<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Library</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #e0e0e0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                width: 80%;
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            .header {
                text-align: center;
                padding: 20px 0;
                background-color: #4a4a4a;
                color: #fff;
                border-radius: 8px 8px 0 0;
            }
            .header h1 {
                margin: 0;
                font-size: 2.5em;
            }
            .description {
                text-align: center;
                margin: 20px 0;
                font-size: 1.2em;
                color: #333;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Welkom in onze digitale bibliotheek
</h1>
            </div>
            <div class="description">
            Ontdek, upload en deel je favoriete momenten met onze community! Met ons platform kunt u moeiteloos uw dierbare foto's uploaden en deze ordenen in een prachtige digitale bibliotheek. Of u nu een professionele fotograaf bent of iemand die graag alledaagse momenten vastlegt, onze gebruiksvriendelijke interface zorgt ervoor dat uw afbeeldingen prachtig worden weergegeven en gemakkelijk toegankelijk zijn.

            </div>
            <div class="description">
            Veel gebruikers en organisaties worden geconfronteerd met uitdagingen bij het effectief beheren van hun mediamiddelen. Dit komt vaak voort uit het ontbreken van een gecentraliseerd, goed georganiseerd opslag- en beheersysteem. Bestaande oplossingen op de markt kunnen onbetaalbaar, te ingewikkeld zijn of niet over de noodzakelijke aanpassingsmogelijkheden beschikken. Onze digitale bibliotheek pakt deze problemen aan door een kosteneffectief, gebruiksvriendelijk en aanpasbaar platform aan te bieden dat is afgestemd op uw behoeften.
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
