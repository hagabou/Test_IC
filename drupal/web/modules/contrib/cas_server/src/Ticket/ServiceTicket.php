<?php

/**
 * @file
 * Contains \Drupal\cas_server\Ticket\ServiceTicket
 */

namespace Drupal\cas_server\Ticket;

class ServiceTicket extends Ticket {

  /**
   * @var string
   * The service this ticket was granted for.
   */
  protected $service;

  /**
   * @var bool
   * Whether or not this ticket was created by presentation of credentials, 
   * rather than a single sign-on session. For use with 'renew' parameter.
   */
  protected $renew;

  /**
   * Constructs a service ticket.
   *
   * @param string $identifier
   *   The data used to identify the ticket.
   * @param string $expiry
   *   A unix timestamp describing the expiration time.
   * @param string $session_string
   *   The hashed session ID of the requestor of ticket.
   * @param string $uid
   *   The uid of the requestor.
   * @param string $username
   *   The username of the requestor.
   * @param string $service_string
   *   URL of the service the ticket is to be used for.
   * @param bool $creds_supplied
   *   Whether or not this ticket was generated by directly supplying creds.
   */
  public function __construct($identifier, $expiry, $session_string, $uid, $username, $service_string, $creds_supplied) {
    $this->id = $identifier;
    $this->expirationTime = $expiry;
    $this->session = $session_string;
    $this->uid = $uid;
    $this->user = $username;
    $this->service = $service_string;
    $this->renew = $creds_supplied;
  }

  /**
   * Return the service the ticket is valid for.
   *
   * @return string
   *   The service string.
   */
  public function getService() {
    return $this->service;
  }

  /**
   * Return whether or not the user specified credentials directly to get
   * this ticket.
   *
   * @return bool
   *   The renew parameter.
   */
  public function getRenew() {
    return $this->renew;
  }
}