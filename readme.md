# AlmaMensa
## Obiettivo del progetto
AlmaMensa è un progetto per il corso di Tecnologie Web 2025/2026 dell'Università di Bologna. L'obiettivo è quello di creare un servizio web per la gestione delle prenotazioni dei pasti presso mense e punti ristoro nelle zone del Campus di Cesena. Si vuole anche dare la possibilità agli utenti di recensire le mense e visualizzare le recensioni degli altri utenti.

## Struttura del progetto
Il progetto è strutturato nella seguente maniera:
- **public/**: Contiene tutti i file da rendere accessibili tramite il web server.
- **src/**: Contiene il codice sorgente del backend, inclusi i controller, i models e le views.
- **database/**: Contiene gli script per la creazione del database, comprese le istruzioni per l'uso.
- **docs/**: Contiene la documentazione del progetto, inclusi i mockups, la fase di progettazione (di massima) e il diagramma E-R.
- **resources/**: Contiene la personalizzazione di Bootstrap.
- **bin/**: Contiene script utili per scaricare e compilare Bootstrap con le personalizzazioni.

## Panoramica del servizio
Il campus di Cesena dell’Università di Bologna vuole offrire un nuovo servizio a tutti i suoi studenti e al suo personale: data la totale assenza di punti ristoro, si vuole creare un unico portale per la gestione delle mense nel territorio cesenate.
Il sistema dovrà prevedere le seguenti tipologie di utenze:
- Utente non registrato
- Cliente
- Gestore mensa

Ogni utente sarà comunque in grado di modificare i propri dati personali.

### Utente non registrato
Un utente non registrato può accedere al portale, ma è in grado di:
- Visualizzare le informazioni generali sul servizio mense
- Visualizzare le recensioni delle mense
- Utilizzare la mappa interattiva per scoprire la posizione delle mense
- Registrarsi al sistema

### Cliente
Per cliente si intendono tutti gli utenti che possono beneficiare del servizio mense, ovvero
studenti, docenti, personale tecnico e amministravo.
Questa tipologia di utente è in grado di:
- Prenotare un posto in una mensa
- Visualizzare, modificare, disdire le proprie prenotazioni
- Aggiungere, modificare, eliminare le proprie recensioni
- Eliminare il proprio account

Per registrare la presenza in mensa, il cliente deve mostrare il qr-code generato dal sistema ad un addetto all’ingresso della mensa.

### Gestore mensa
Ad ogni mensa vengono assegnate delle credenziali dal DBA.
Questa tipologia di utente è in grado di:
- Modificare i dati della mensa, inclusi i piatti, gli orari di apertura e i menù
- Visualizzare le recensioni della mensa
- Visualizzare le prenotazioni effettuate dai clienti
- Registrare le presenze dei clienti scannerizzando i qr-code generati dal sistema
