<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
namespace Metinet\Domain;

class DateConference
{
    private $dateConference;

    public static function fromString(string $dateConference): self
    {
        return new self($dateConference);
    }

    public function toAge(): int
    {
        return (new \DateTimeImmutable('now'))->diff($this->dateConference)->y;
    }

    private function __construct(string $dateConference)
    {
        $dateConferenceAsDateTime = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', sprintf('%s 23:59:59', $dateConference));
        if ($dateConferenceAsDateTime < new \DateTimeImmutable('past')) {

            throw InvalidDateConference::mustNotBeInThePast();
        }

        $this->dateConference = $dateConferenceAsDateTime;
    }
}
