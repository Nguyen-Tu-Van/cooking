<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'firebase' => [
    //     'database_url' => env('FIREBASE_DATABASE_URL', 'https://cooking-89482.firebaseio.com/'),
    //     'project_id' => env('FIREBASE_PROJECT_ID', 'cooking-89482'),
    //     'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID', 'cd75ceb30d0b1bc67414a8edeb0e773524fa5951'),
    //     'private_key' => str_replace("\\n", "\n", env('FIREBASE_PRIVATE_KEY', '-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCMKvtykE6msjuV\n1+Ve54Vx7z07Us/rI9P71aaodrjsMv8wSJsw/YBbrpG5UXoIiTToUQysV7P4q3Ow\nlnRLihf9R3+zMP+fO4JqsQFOZlpq5YRJOGScIV7g6weTeFVLAzSJNq4M9q3Frxxw\nbZLk8tDoQjekq2z9kqNu6KC88eYqT20YXPXMTqgWn1A5y4IzCJ30rnbw4zhYwEab\n33bZgjmvrB8eshitg6psTyjFUMzYW9XJs9qu1NBLpnqa+NW81wakHeW3aGbv8lYJ\nDQPGU6voYhMFbU9FffLrS3V/2lukUNI3adjrSc8dAZK+9oqj5lbncIK2aP+u7h+g\nVfzDeDtLAgMBAAECggEACurUH+W2goxSUMb6kgxFXAzuv36hPCbTvYM0El4A5EDK\nmIenMscj5sAvkHgUobKSIOAjNQ81sNIl1iS51SJh4PPfMeVIm63maAn2WJVnSHks\n9wkB6Rk+SxVzRxyxxABxaJiOMOtLuKB9fhJCxTtWYyi5LcW+XPe9bAeJcX4D19qv\nU/afL6P9HobbYNZy/xGLC17qLU8JyZI+AA5RstiW0zejpOAssDynufbyPS+eun1E\nhlgjnmUpLiABrpbv72iLP4V/nL2PIOci2hEZoyf/LstmsOl/QPneG+TYiWb4qfHB\nOZ+DOSsJsOwMPQkPdD8omhvy5hm19fgNKTeeF3j27QKBgQDFG6sR11CLeD7ztWPl\nT1/DniPteLeiWsiW7jcytScH1cSqj7LynWcEiaLPijaq6+jmXNpxFIgrGgssm12w\nE4cnZlAQu6RwwQWNGtHMWggBOcwWb4uYn9EhXOLSdjEbXvOw0T4wZdpVzhOnTBsN\n3Vn0iLkzC7N0ssnZ3VMDe8dMnwKBgQC2DBgROx8F/9kBoeCpoIEaFdjsAaz/dLNT\nYlAv0n53zDB7usNjuqLOU66FG2nHJLHGWGEMy4jS3iUIAbtEo0t51MYTqUg+YPaT\nqL+U/lS6Kg4ziUJSmHqjLYSGVqTPLsyvSOUgoDQTeh+JcqRLvJzXdgi7dzkJtacW\nR5Lxs92l1QKBgQCfL3k5L2sdOD+fEx9aUoBEu7LIVnX36NmXC0wI58Rdz4bFOMiM\nqBJK191lP3pnD59IbDT+nlZaeO4NWGyRhzPf3gFLgj+L0FdrXf2RzCQq2UK529wh\npvB+wUVuM4X1VPn6EwLmk1uBcKzur8gpqlq74q+vSgPke4AJM3WXmp+agQKBgD+Q\nW3rwvLVYjwnt3sb7nvhftn05XJFZyx+LTVpVUgk8R5V8MasJyLzoJSCe4MFDA7uw\nsjpIev69yApSqHOf3MOuUncc/XeiXZZTLom0gBr8gjbmbzzttqxxQTuy1xrsSVXO\nywooReajFo3kdI9pTQ5CTWw/ha/pOG0kEp/IYNT9AoGAYcT/lT1b4m/Zhb0uvqcH\n+/uNtfPyyT40XXT+KtCwq/9F6p6t7dfPcw3YMZscXGtvTgGTPv9lJCwT6BQZrhPd\nBYkUKfV6oyUe6KahZm7f/exiZBKtdVKAfkqX25Fu6wzwVQLRHrY0hTl85Ozlicb8\nfubI+9FkIioIbhKaabXgF/c=\n-----END PRIVATE KEY-----\n')),
    //     'client_email' => env('FIREBASE_CLIENT_EMAIL', 'firebase-adminsdk-uty0a@cooking-89482.iam.gserviceaccount.com'),
    //     'client_id' => env('FIREBASE_CLIENT_ID', '112429560963831912850'),
    //     'client_x509_cert_url' => env('FIREBASE_CLIENT_x509_CERT_URL', 'https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-uty0a%40cooking-89482.iam.gserviceaccount.com'),
    // ],
    // 'firebase' => [
    //     'database_url' => 'https://cooking-89482.firebaseio.com',
    //     'secret' => '-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCMKvtykE6msjuV\n1+Ve54Vx7z07Us/rI9P71aaodrjsMv8wSJsw/YBbrpG5UXoIiTToUQysV7P4q3Ow\nlnRLihf9R3+zMP+fO4JqsQFOZlpq5YRJOGScIV7g6weTeFVLAzSJNq4M9q3Frxxw\nbZLk8tDoQjekq2z9kqNu6KC88eYqT20YXPXMTqgWn1A5y4IzCJ30rnbw4zhYwEab\n33bZgjmvrB8eshitg6psTyjFUMzYW9XJs9qu1NBLpnqa+NW81wakHeW3aGbv8lYJ\nDQPGU6voYhMFbU9FffLrS3V/2lukUNI3adjrSc8dAZK+9oqj5lbncIK2aP+u7h+g\nVfzDeDtLAgMBAAECggEACurUH+W2goxSUMb6kgxFXAzuv36hPCbTvYM0El4A5EDK\nmIenMscj5sAvkHgUobKSIOAjNQ81sNIl1iS51SJh4PPfMeVIm63maAn2WJVnSHks\n9wkB6Rk+SxVzRxyxxABxaJiOMOtLuKB9fhJCxTtWYyi5LcW+XPe9bAeJcX4D19qv\nU/afL6P9HobbYNZy/xGLC17qLU8JyZI+AA5RstiW0zejpOAssDynufbyPS+eun1E\nhlgjnmUpLiABrpbv72iLP4V/nL2PIOci2hEZoyf/LstmsOl/QPneG+TYiWb4qfHB\nOZ+DOSsJsOwMPQkPdD8omhvy5hm19fgNKTeeF3j27QKBgQDFG6sR11CLeD7ztWPl\nT1/DniPteLeiWsiW7jcytScH1cSqj7LynWcEiaLPijaq6+jmXNpxFIgrGgssm12w\nE4cnZlAQu6RwwQWNGtHMWggBOcwWb4uYn9EhXOLSdjEbXvOw0T4wZdpVzhOnTBsN\n3Vn0iLkzC7N0ssnZ3VMDe8dMnwKBgQC2DBgROx8F/9kBoeCpoIEaFdjsAaz/dLNT\nYlAv0n53zDB7usNjuqLOU66FG2nHJLHGWGEMy4jS3iUIAbtEo0t51MYTqUg+YPaT\nqL+U/lS6Kg4ziUJSmHqjLYSGVqTPLsyvSOUgoDQTeh+JcqRLvJzXdgi7dzkJtacW\nR5Lxs92l1QKBgQCfL3k5L2sdOD+fEx9aUoBEu7LIVnX36NmXC0wI58Rdz4bFOMiM\nqBJK191lP3pnD59IbDT+nlZaeO4NWGyRhzPf3gFLgj+L0FdrXf2RzCQq2UK529wh\npvB+wUVuM4X1VPn6EwLmk1uBcKzur8gpqlq74q+vSgPke4AJM3WXmp+agQKBgD+Q\nW3rwvLVYjwnt3sb7nvhftn05XJFZyx+LTVpVUgk8R5V8MasJyLzoJSCe4MFDA7uw\nsjpIev69yApSqHOf3MOuUncc/XeiXZZTLom0gBr8gjbmbzzttqxxQTuy1xrsSVXO\nywooReajFo3kdI9pTQ5CTWw/ha/pOG0kEp/IYNT9AoGAYcT/lT1b4m/Zhb0uvqcH\n+/uNtfPyyT40XXT+KtCwq/9F6p6t7dfPcw3YMZscXGtvTgGTPv9lJCwT6BQZrhPd\nBYkUKfV6oyUe6KahZm7f/exiZBKtdVKAfkqX25Fu6wzwVQLRHrY0hTl85Ozlicb8\nfubI+9FkIioIbhKaabXgF/c=\n-----END PRIVATE KEY-----\n',
    // ],
    // 'firebase' => [
    //     'credentials' => [
    //         'file' => storage_path('firebase-adminsdk.json'),
    //     ],
    //     'database_url' => 'https://cooking-89482.firebaseio.com',
    // ],
    'firebase' => [
        'sdk' => [
            'serviceAccount' => storage_path('app/firebase-adminsdk.json'),
            'databaseURL' => 'https://cooking-89482.firebaseio.com',
        ],
    ],
];
