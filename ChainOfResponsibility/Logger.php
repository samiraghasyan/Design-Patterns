<?php


abstract class Logger{

    protected ?Logger $next = null;

    public function setNext(Logger $logger): Logger{
        $this->next = $logger;
        return $logger;
    }
    public function log(string $level, string $messge): void
    {
        if($this->canHandle($level)){
            $this->write($messge);
        }

        if($this->next){
            $this->next->log($level, $messge);
        }
    }
    abstract protected function canHandle(string $level): bool;
    abstract protected function write(string $message): void;

}

class ConsoleLogger extends Logger{
    protected function canHandle(string $level): bool
    {
        return in_array($level, ['DEBUG', 'ERROR', 'CRITICAL']);
    }

    protected function write(string $message): void
    {
        echo "Console: $message<br>";
    }
}

class FileLogger extends Logger{
    protected function canHandle(string $level): bool
    {
        return in_array($level, ["ERROR", "CRITICAL"]);
    }

    protected function write(string $message): void
    {
        echo "File: $message saved to log.txt<br>";
    }
}

class DatabaseLogger extends Logger {
    protected function canHandle(string $level): bool {
        return $level === "CRITICAL";
    }

    protected function write(string $message): void {
        echo "Database: $message stored in DB<br>";
    }
}


$consoleLogger = new ConsoleLogger();
$fileLogger = new FileLogger();
$dbLogger = new DatabaseLogger();

$consoleLogger->setNext($fileLogger)->setNext($dbLogger);

$consoleLogger->log('DEBUG','This is a debug message');
$consoleLogger->log('ERROR','Something went wrong');
$consoleLogger->log('CRITICAL','System failure');