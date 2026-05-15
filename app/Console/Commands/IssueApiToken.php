<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class IssueApiToken extends Command
{
    protected $signature = 'anica:issue-token
                            {name : Nombre identificativo del cliente (ej: "Java desktop — taller principal")}
                            {--email=gerencia@monkeyscompany.com : Correo del usuario propietario del token}';

    protected $description = 'Emite un token Sanctum para que la app Java se autentique contra /api/v1/*';

    public function handle(): int
    {
        $user = User::firstOrCreate(
            ['email' => $this->option('email')],
            [
                'name' => 'Anica System',
                'password' => Hash::make(bin2hex(random_bytes(16))),
                'email_verified_at' => now(),
            ]
        );

        $token = $user->createToken($this->argument('name'), ['repairs:write']);

        $this->newLine();
        $this->info('Token creado. Guárdalo en un lugar seguro — no se mostrará de nuevo:');
        $this->newLine();
        $this->line('  '.$token->plainTextToken);
        $this->newLine();
        $this->comment('Uso en la app Java:');
        $this->line('  Authorization: Bearer '.$token->plainTextToken);
        $this->newLine();
        $this->comment('Para revocar: php artisan tinker => User::find('.$user->id.')->tokens()->where("name","'.$this->argument('name').'")->delete();');

        return self::SUCCESS;
    }
}
