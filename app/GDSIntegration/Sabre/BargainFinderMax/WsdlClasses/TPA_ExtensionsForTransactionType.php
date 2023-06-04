<?php


namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;


class TPA_ExtensionsForTransactionType
{
    /**
     * @var TransactionType $IntelliSellTransaction
     */
    protected $IntelliSellTransaction = null;

    /**
     * @var MultiTicket $MultiTicket
     */
    protected $MultiTicket = null;

    public function __construct($IntelliSellTransaction = null,$MultiTicket = null)
    {
        $this->IntelliSellTransaction = $IntelliSellTransaction;
        $this->MultiTicket = $MultiTicket;
    }

    /**
     * @return TransactionType
     */
    public function getIntelliSellTransaction()
    {
        return $this->IntelliSellTransaction;
    }

    /**
     * @param TransactionType $IntelliSellTransaction
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_ExtensionsForTransactionType
     */
    public function setIntelliSellTransaction($IntelliSellTransaction)
    {
        $this->IntelliSellTransaction = $IntelliSellTransaction;
        return $this;
    }

    /**
     * @return MultiTicket
     */
    public function getMultiTicket()
    {
        return $this->MultiTicket;
    }

    /**
     * @param MultiTicket $MultiTicket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_ExtensionsForTransactionType
     */
    public function setMultiTicket($MultiTicket)
    {
        $this->MultiTicket = $MultiTicket;
        return $this;
    }
}
