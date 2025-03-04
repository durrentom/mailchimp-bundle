<?php

namespace Welp\MailchimpBundle\Exception;

/**
 * Handle MailChimp API errors
 */
class MailchimpException extends \Exception
{
    /**
     * The HTTP status code (RFC2616, Section 6) generated by the origin server
     * for this occurrence of the problem.
     * @var int
     */
    private int $status;

    /**
     * A human-readable explanation specific to this occurrence of the problem.
     * @var string
     */
    private string $detail;

    /**
     * An absolute URI that identifies the problem type. When dereferenced,
     * it should provide human-readable documentation for the problem type.
     * @var string
     */
    private string $type;

    /**
     * A short, human-readable summary of the problem type.
     * It shouldn’t change based on the occurrence of the problem,
     * except for purposes of localization.
     * @var string
     */
    private string $title;

    /**
     * For field-specific details, see the 'errors' array.
     * @var array|null
     */
    private ?array $errors;

    /**
     * A string that identifies this specific occurrence of the problem.
     * Please provide this ID when contacting support.
     * @var string
     */
    private ?string $instance;

    /**
     * http://developer.mailchimp.com/documentation/mailchimp/guides/get-started-with-mailchimp-api-3/#errors
     * @param int    $status
     * @param string $detail
     * @param string $type
     * @param string $title
     * @param array  $errors
     * @param string $instance
     * @param \Throwable $previous
     * @todo Fix $status: Optional parameter is provided before required.
     */
    public function __construct($status = 0, $detail, $type, $title, $errors = null, $instance = null, \Throwable $previous=null)
    {
        parent::__construct($detail, $status, $previous);

        $this->status = $status;
        $this->detail = $detail;
        $this->type = $type;
        $this->title = $title;
        $this->errors = $errors;
        $this->instance = $instance;
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $title
     *
     * @return static
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param array $errors
     *
     * @return static
     */
    public function setErrors(array $errors): static
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @param string $instance
     *
     * @return static
     */
    public function setInstance(string $instance): static
    {
        $this->instance = $instance;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getInstance(): ?string
    {
        return $this->instance;
    }

    /**
     * @return
     * @todo: Artifact?
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @return array|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }
}
