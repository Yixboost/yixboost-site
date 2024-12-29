import json

def add_image_keys(file_path):
    # Lees de inhoud van games.json
    with open(file_path, 'r') as file:
        games = json.load(file)

    # Voeg "image" toe waar het ontbreekt
    for game_id, game_data in games.items():
        if 'image' not in game_data:
            game_data['image'] = f"https://yixboost-games.github.io/{game_id}/{game_id}.png"

    # Sla het gewijzigde bestand op
    with open(file_path, 'w') as file:
        json.dump(games, file, indent=4)

# Gebruik het script
add_image_keys('games.json')
