<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * AllListsSubscribersFilters
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.3.6.3
 */

class AllListsSubscribersFilters extends ListSubscriber
{
    /**
     * flag for view list
     */
    public const ACTION_VIEW = 'view';

    /**
     * flag for export
     */
    public const ACTION_EXPORT = 'export';

    /**
     * flag for confirm
     */
    public const ACTION_CONFIRM = 'confirm';

    /**
     * flag for disable
     */
    public const ACTION_DISABLE = 'disable';

    /**
     * flag for unsubscribe
     */
    public const ACTION_UNSUBSCRIBE = 'unsubscribe';

    /**
     * flag for blacklist
     */
    public const ACTION_BLACKLIST = 'blacklist';

    /**
     * flag for delete
     */
    public const ACTION_DELETE = 'delete';

    /**
     * flag to create new list
     */
    public const ACTION_CREATE_LIST = 'create-list';

    /**
     * flag for the result set batch size
     */
    public const PROCESS_SUBSCRIBERS_BATCH_SIZE = 1000;
    public const PROCESS_SUBSCRIBERS_CHUNK_SIZE = 500;

    /**
     * @var Customer|null $customer
     */
    public $customer;

    /**
     * @var int
     */
    public $customer_id;

    /**
     * @var array $lists list id => list name
     */
    public $lists = [];

    /**
     * @var array $statuses - subscriber statuses
     */
    public $statuses = [];

    /**
     * @var array $sources - import sources
     */
    public $sources = [];

    /**
     * @var string $unique - only unique subs
     */
    public $unique;

    /**
     * @var string $uid
     */
    public $uid;

    /**
     * @var string $ip
     */
    public $ip;

    /**
     * @var string $email
     */
    public $email;

    /**
     * @var string $action
     */
    public $action;

    /**
     * @var bool
     */
    public $hasSetFilters = false;

    /**
     * @var string
     */
    public $campaigns_action;

    /**
     * @var array
     */
    public $campaigns;

    /**
     * @var string
     */
    public $campaigns_atuc;

    /**
     * @var string
     */
    public $campaigns_atu;

    /**
     * @var string
     */
    public $date_added_start;

    /**
     * @var string
     */
    public $date_added_end;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['lists', '_validateMultipleListsSelection'],
            ['statuses', '_validateMultipleStatusesSelection'],
            ['sources', '_validateMultipleSourcesSelection'],
            ['action', 'in', 'range' => array_keys($this->getActionsList())],
            ['unique', 'in', 'range' => array_keys($this->getYesNoOptions())],
            ['campaigns_action', 'in', 'range' => array_keys($this->getCampaignFilterActions())],
            ['campaigns_atu', 'in', 'range' => array_keys($this->getFilterTimeUnits())],
            ['campaigns_atuc', 'numerical', 'integerOnly' => true, 'min' => 1, 'max' => 1024],
            ['uid, email, ip, campaigns', 'safe'],
            ['date_added_start, date_added_end', 'date', 'format' => 'yyyy-M-d'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return CMap::mergeArray(parent::attributeLabels(), [
            'lists'          => t('list_subscribers', 'Lists'),
            'statuses'       => t('list_subscribers', 'Statuses'),
            'sources'        => t('list_subscribers', 'Sources'),
            'action'         => t('list_subscribers', 'Action'),
            'unique'         => t('list_subscribers', 'Unique'),
            'uid'            => t('list_subscribers', 'Unique ID'),
            'email'          => t('list_subscribers', 'Email'),
            'ip'             => t('list_subscribers', 'Ip Address'),

            'campaigns'         => t('list_subscribers', 'Campaigns'),
            'campaigns_action'  => t('list_subscribers', 'Campaigns Action'),
            'campaigns_atuc'    => '',
            'campaigns_atu'     => '',

            'date_added_start' => t('list_subscribers', 'Date added start'),
            'date_added_end'   => t('list_subscribers', 'Date added end'),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function attributePlaceholders()
    {
        return [
            'uid'   => 'jm338w77e4eea',
            'email' => 'name@domain.com',
            'ip'    => '123.123.123.100',
        ];
    }

    /**
     * @inheritDoc
     */
    public function beforeValidate()
    {
        return true;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AllListsSubscribersFilters the static model class
     */
    public static function model($className=self::class)
    {
        /** @var AllListsSubscribersFilters $model */
        $model = parent::model($className);

        return $model;
    }

    /**
     * @return array
     */
    public function getListsList(): array
    {
        static $listsList = [];

        if (!empty($listsList[$this->getCustomer()->customer_id])) {
            return $listsList[$this->getCustomer()->customer_id];
        }

        $criteria = new CDbCriteria();
        $criteria->compare('customer_id', $this->getCustomer()->customer_id);
        $criteria->addNotInCondition('status', [Lists::STATUS_PENDING_DELETE, Lists::STATUS_ARCHIVED]);

        return $listsList[$this->getCustomer()->customer_id] = ListsCollection::findAll($criteria)->mapWithKeys(function (Lists $list) {
            return [$list->list_id => $list->name . '(' . $list->display_name . ')'];
        })->all();
    }

    /**
     * @inheritDoc
     */
    public function getStatusesList(): array
    {
        return $this->getEmptySubscriberModel()->getFilterStatusesList();
    }

    /**
     * @return array
     */
    public function getSourcesList(): array
    {
        return $this->getEmptySubscriberModel()->getSourcesList();
    }

    /**
     * @return array
     */
    public function getActionsList(): array
    {
        $actions = [
            self::ACTION_VIEW        => t('list_subscribers', ucfirst(self::ACTION_VIEW)),
            self::ACTION_EXPORT      => t('list_subscribers', ucfirst(self::ACTION_EXPORT)),
            self::ACTION_CREATE_LIST => t('list_subscribers', 'Create list'),
            self::ACTION_CONFIRM     => t('list_subscribers', ucfirst(self::ACTION_CONFIRM)),
            self::ACTION_DISABLE     => t('list_subscribers', ucfirst(self::ACTION_DISABLE)),
            self::ACTION_UNSUBSCRIBE => t('list_subscribers', ucfirst(self::ACTION_UNSUBSCRIBE)),
            self::ACTION_BLACKLIST   => t('list_subscribers', ucfirst(self::ACTION_BLACKLIST)),
            self::ACTION_DELETE      => t('list_subscribers', ucfirst(self::ACTION_DELETE)),
        ];

        $canExport = $this->getCustomer()->getGroupOption('lists.can_export_subscribers', 'yes') == 'yes';
        if (!$canExport) {
            unset($actions[self::ACTION_EXPORT]);
        }

        $canBlacklist = $this->getCustomer()->getGroupOption('lists.can_use_own_blacklist', 'no') == 'yes';
        if (!$canBlacklist) {
            unset($actions[self::ACTION_BLACKLIST]);
        }

        $canDelete = $this->getCustomer()->getGroupOption('lists.can_delete_own_subscribers', 'yes') == 'yes';
        if (!$canDelete) {
            unset($actions[self::ACTION_DELETE]);
        }

        $canCreateList = $this->getCustomer()->getGroupOption('lists.can_create_list_from_filters', 'yes') == 'yes';
        if (!$canCreateList) {
            unset($actions[self::ACTION_CREATE_LIST]);
        }

        return $actions;
    }

    /**
     * @return bool
     */
    public function getIsViewAction(): bool
    {
        return empty($this->action) || (string)$this->action === self::ACTION_VIEW;
    }

    /**
     * @return bool
     */
    public function getIsExportAction(): bool
    {
        return (string)$this->action === self::ACTION_EXPORT;
    }

    /**
     * @return bool
     */
    public function getIsConfirmAction(): bool
    {
        return (string)$this->action === self::ACTION_CONFIRM;
    }

    /**
     * @return bool
     */
    public function getIsUnsubscribeAction(): bool
    {
        return (string)$this->action === self::ACTION_UNSUBSCRIBE;
    }

    /**
     * @return bool
     */
    public function getIsDisableAction(): bool
    {
        return (string)$this->action === self::ACTION_DISABLE;
    }

    /**
     * @return bool
     */
    public function getIsBlacklistAction(): bool
    {
        return (string)$this->action === self::ACTION_BLACKLIST;
    }

    /**
     * @return bool
     */
    public function getIsDeleteAction(): bool
    {
        return (string)$this->action === self::ACTION_DELETE;
    }

    /**
     * @return bool
     */
    public function getIsCreateListAction(): bool
    {
        return (string)$this->action === self::ACTION_CREATE_LIST;
    }

    /**
     * @return ListSubscriber
     */
    public function getEmptySubscriberModel(): ListSubscriber
    {
        static $subscriber;
        if ($subscriber !== null) {
            return $subscriber;
        }
        return $subscriber = new ListSubscriber();
    }

    /**
     * @return Generator
     */
    public function getSubscribersIds(): Generator
    {
        $criteria = $this->buildSubscribersCriteria();
        $criteria->select = 't.subscriber_id';
        $criteria->limit  = self::PROCESS_SUBSCRIBERS_BATCH_SIZE;
        $criteria->offset = 0;

        while (true) {
            $models = ListSubscriber::model()->findAll($criteria);
            if (empty($models)) {
                break;
            }

            foreach ($models as $model) {
                yield (int)$model->subscriber_id;
            }

            $criteria->offset = (int)$criteria->offset + (int)$criteria->limit;
        }
    }

    /**
     * @return array
     */
    public function getSubscribersIdsChunks(): array
    {
        return array_chunk(iterator_to_array($this->getSubscribersIds()), self::PROCESS_SUBSCRIBERS_CHUNK_SIZE);
    }

    /**
     * @return Generator
     */
    public function getSubscribers(): Generator
    {
        $criteria = $this->buildSubscribersCriteria();
        $criteria->limit  = self::PROCESS_SUBSCRIBERS_BATCH_SIZE;
        $criteria->offset = 0;

        while (true) {
            $models = ListSubscriber::model()->findAll($criteria);
            if (empty($models)) {
                break;
            }

            foreach ($models as $model) {
                yield $model;
            }

            $criteria->offset = (int)$criteria->offset + (int)$criteria->limit;
        }
    }

    /**
     * @param bool $isCount
     *
     * @return CDbCriteria
     */
    public function buildSubscribersCriteria(bool $isCount = false): CDbCriteria
    {
        $lists = $this->lists;
        if (empty($this->lists)) {
            $lists = array_keys($this->getListsList());
        }
        $lists = array_filter(array_unique(array_map('intval', $lists)));
        if (empty($lists)) {
            $lists = [0];
        }

        $criteria = new CDbCriteria();
        $criteria->with = [];

        $criteria->addInCondition('t.list_id', $lists);
        $criteria->compare('t.subscriber_uid', $this->uid, true);

        // 1.3.7.1
        if (!empty($this->email)) {
            if (strpos($this->email, ',') !== false) {
                $emails = CommonHelper::getArrayFromString((string)$this->email, ',');
                foreach ($emails as $index => $email) {
                    if (!FilterVarHelper::email($email)) {
                        unset($emails[$index]);
                    }
                }
                if (!empty($emails)) {
                    $criteria->addInCondition('t.email', $emails);
                }
            } else {
                $criteria->compare('t.email', $this->email, true);
            }
        }
        //

        $criteria->compare('t.ip_address', $this->ip, true);

        if (!empty($this->statuses) && is_array($this->statuses)) {
            $criteria->addInCondition('t.status', $this->statuses);
        }

        if (!empty($this->sources) && is_array($this->sources)) {
            $criteria->addInCondition('t.source', $this->sources);
        }

        if (!empty($this->date_added_start) || !empty($this->date_added_end)) {
            $dateCompare = [];
            if (!empty($this->date_added_start)) {
                $dateCompare[] = 'DATE(t.date_added) >= :das';
                $criteria->params[':das'] = date('Y-m-d', (int)strtotime($this->date_added_start));
            }
            if (!empty($this->date_added_end)) {
                $dateCompare[] = 'DATE(t.date_added) <= :dae';
                $criteria->params[':dae'] = date('Y-m-d', (int)strtotime($this->date_added_end));
            }
            $criteria->addCondition(sprintf('(%s)', implode(' AND ', $dateCompare)));
        }

        if (!empty($this->campaigns_action)) {
            $action = $this->campaigns_action;

            $campaignIds = [];
            if (!empty($this->campaigns) && is_array($this->campaigns)) {
                $campaignIds = array_filter(array_unique(array_map('intval', $this->campaigns)));
            }
            if (empty($campaignIds)) {
                $campaignIds = array_keys($this->getCampaignsList());
            }
            if (empty($campaignIds)) {
                $campaignIds = [0];
            }

            $atu  = $this->getFilterTimeUnitValueForDb((int)$this->campaigns_atu);
            $atuc = (int)$this->campaigns_atuc;
            $atuc = $atuc > 1024 ? 1024 : $atuc;
            $atuc = $atuc < 0 ? 0 : $atuc;

            if (in_array($action, [self::CAMPAIGN_FILTER_ACTION_DID_OPEN, self::CAMPAIGN_FILTER_ACTION_DID_NOT_OPEN])) {
                $rel = [
                    'select'   => false,
                    'together' => true,
                ];

                if ($action == self::CAMPAIGN_FILTER_ACTION_DID_OPEN) {
                    $rel['joinType']  = 'INNER JOIN';
                    $rel['condition'] = 'trackOpens.campaign_id IN (' . implode(',', $campaignIds) . ')';
                    if (!empty($atuc)) {
                        $rel['condition'] .= sprintf(' AND trackOpens.date_added >= DATE_SUB(NOW(), INTERVAL %d %s)', $atuc, $atu);
                    }
                } else {
                    $rel['on']        = 'trackOpens.campaign_id IN (' . implode(',', $campaignIds) . ')';
                    $rel['joinType']  = 'LEFT OUTER JOIN';
                    $rel['condition'] = 'trackOpens.subscriber_id IS NULL';
                    if (!empty($atuc)) {
                        $rel['condition'] .= sprintf(' OR (trackOpens.subscriber_id IS NOT NULL AND (SELECT date_added FROM {{campaign_track_open}} WHERE subscriber_id = trackOpens.subscriber_id ORDER BY date_added DESC LIMIT 1) <= DATE_SUB(NOW(), INTERVAL %d %s))', $atuc, $atu);
                    }
                }

                $criteria->with['trackOpens'] = $rel;
            }

            if (in_array($action, [self::CAMPAIGN_FILTER_ACTION_DID_CLICK, self::CAMPAIGN_FILTER_ACTION_DID_NOT_CLICK])) {
                $ucriteria = new CDbCriteria();
                $ucriteria->select = 'url_id';
                $ucriteria->addInCondition('campaign_id', $campaignIds);
                $models = CampaignUrl::model()->findAll($ucriteria);
                $urlIds = [];
                foreach ($models as $model) {
                    $urlIds[] = (int)$model->url_id;
                }

                if (empty($urlIds)) {
                    $urlIds = [0];
                }

                $rel = [
                    'select'   => false,
                    'together' => true,
                ];

                if ($action == self::CAMPAIGN_FILTER_ACTION_DID_CLICK) {
                    $rel['joinType']  = 'INNER JOIN';
                    $rel['condition'] = 'trackUrls.url_id IN (' . implode(',', $urlIds) . ')';
                    if (!empty($atuc)) {
                        $rel['condition'] .= sprintf(' AND trackUrls.date_added >= DATE_SUB(NOW(), INTERVAL %d %s)', $atuc, $atu);
                    }
                } else {
                    $rel['on']        = 'trackUrls.url_id IN (' . implode(',', $urlIds) . ')';
                    $rel['joinType']  = 'LEFT OUTER JOIN';
                    $rel['condition'] = 'trackUrls.subscriber_id IS NULL';
                    if (!empty($atuc)) {
                        $rel['condition'] .= sprintf(' OR (trackUrls.subscriber_id IS NOT NULL AND (SELECT date_added FROM {{campaign_track_url}} WHERE subscriber_id = trackUrls.subscriber_id ORDER BY date_added DESC LIMIT 1) <= DATE_SUB(NOW(), INTERVAL %d %s))', $atuc, $atu);
                    }
                }

                $criteria->with['trackUrls'] = $rel;
                $this->unique = self::TEXT_YES;
            }

            if (in_array($action, [self::CAMPAIGN_FILTER_ACTION_DID_OPEN, self::CAMPAIGN_FILTER_ACTION_DID_NOT_OPEN, self::CAMPAIGN_FILTER_ACTION_DID_CLICK, self::CAMPAIGN_FILTER_ACTION_DID_NOT_CLICK])) {
                $criteria->with['deliveryLogs'] = [
                    'joinType'  => 'LEFT JOIN',
                ];
                $criteria->with['deliveryLogsArchive'] = [
                    'joinType'  => 'LEFT JOIN',
                ];
                $criteria->addCondition('(
	                EXISTS(SELECT subscriber_id FROM {{campaign_delivery_log}} WHERE subscriber_id = t.subscriber_id LIMIT 1)
	                OR
	                EXISTS(SELECT subscriber_id FROM {{campaign_delivery_log_archive}} WHERE subscriber_id = t.subscriber_id LIMIT 1)
	            )');
            }
        }

        if ($this->unique == self::TEXT_YES) {
            $criteria->group = 't.email';
        } else {
            $criteria->group = 't.subscriber_id';
        }

        $criteria->order  = 't.subscriber_id DESC';

        // 1.5.0
        if ($isCount && $this->unique == self::TEXT_YES) {
            $criteria->select = 'COUNT(DISTINCT(t.email)) as count';
            $criteria->group  = '';
        }

        return $criteria;
    }

    /**
     * @return CActiveDataProvider
     * @throws CException
     */
    public function getActiveDataProvider(): CActiveDataProvider
    {
        return new CActiveDataProvider(get_class($this), [
            'criteria'      => $this->buildSubscribersCriteria(),
            'countCriteria' => $this->buildSubscribersCriteria(true),
            'pagination'    => [
                'pageSize'  => $this->paginationOptions->getPageSize(),
                'pageVar'   => 'page',
            ],
            'sort'  => [
                'defaultOrder'  => [
                    't.subscriber_id'   => CSort::SORT_DESC,
                ],
            ],
        ]);
    }

    /**
     * @return array
     */
    public function getCampaignsList(): array
    {
        $lists = array_keys($this->getListsList());
        if (empty($lists)) {
            $lists = [0];
        }

        $criteria = new CDbCriteria();
        $criteria->select = 'campaign_id, name';
        $criteria->addInCondition('list_id', $lists);
        $criteria->addNotInCondition('status', [Campaign::STATUS_PENDING_DELETE, Campaign::STATUS_DRAFT]);
        $criteria->order = 'campaign_id DESC';

        return CampaignCollection::findAll($criteria)->mapWithKeys(function (Campaign $campaign) {
            return [$campaign->campaign_id => $campaign->name];
        })->all();
    }

    /**
     * Confirm subscribers matching the criteria
     */
    public function confirmSubscribers(): void
    {
        array_map([$this, 'confirmSubscribersByIds'], $this->getSubscribersIdsChunks());
    }

    /**
     * @param array $subscribersIds
     *
     * @throws CException
     */
    public function confirmSubscribersByIds(array $subscribersIds = []): void
    {
        if (empty($subscribersIds)) {
            return;
        }

        try {
            $subscribersIds       = array_filter(array_unique(array_map('intval', $subscribersIds)));
            $canMarkBlAsConfirmed = $this->getCustomer()->getGroupOption('lists.can_mark_blacklisted_as_confirmed', 'no') === 'yes';

            // get all blacklisted subscribers
            $command     = db()->createCommand();
            $subscribers = $command->select('email')->from('{{list_subscriber}}')->where(['and',
                ['in', 'subscriber_id', $subscribersIds],
                ['in', 'status', [ListSubscriber::STATUS_BLACKLISTED]],
            ])->queryAll();

            if (!empty($subscribers)) {
                $emails = [];
                foreach ($subscribers as $subscriber) {
                    $emails[] = $subscriber['email'];
                }

                $emails = array_chunk($emails, 100);

                foreach ($emails as $emailsChunk) {
                    // delete from customer blacklist
                    db()->createCommand()->delete('{{customer_email_blacklist}}', ['and',
                        ['in', 'email', $emailsChunk],
                        ['in', 'customer_id', [$this->getCustomer()->customer_id]],
                    ]);

                    if (!$canMarkBlAsConfirmed) {
                        continue;
                    }

                    // delete from global blacklist if allowed.
                    db()->createCommand()->delete('{{email_blacklist}}', ['and',
                        ['in', 'email', $emailsChunk],
                    ]);
                }
            }

            // statuses that are not allowed to be marked confirmed
            $notInStatus = [
                ListSubscriber::STATUS_CONFIRMED,
                ListSubscriber::STATUS_UNSUBSCRIBED,
            ];

            $command = db()->createCommand();
            $command->update('{{list_subscriber}}', [
                'status'        => ListSubscriber::STATUS_CONFIRMED,
                'last_updated'  => MW_DATETIME_NOW,
            ], ['and',
                ['in', 'subscriber_id', $subscribersIds],
                ['not in', 'status', $notInStatus],
            ]);

            // 1.3.8.8 - remove from moved table
            $_criteria = new CDbCriteria();
            $_criteria->addInCondition('source_subscriber_id', $subscribersIds);
            ListSubscriberListMove::model()->deleteAll($_criteria);
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }

        // since 1.6.4
        Lists::flushSubscribersCountCacheBySubscriberIds($subscribersIds);
    }

    /**
     * Unsubscribe subscribers matching the criteria
     */
    public function unsubscribeSubscribers(): void
    {
        array_map([$this, 'unsubscribeSubscribersByIds'], $this->getSubscribersIdsChunks());
    }

    /**
     * @param array $subscribersIds
     *
     * @throws CException
     */
    public function unsubscribeSubscribersByIds(array $subscribersIds = []): void
    {
        if (empty($subscribersIds)) {
            return;
        }

        $subscribersIds = array_filter(array_unique(array_map('intval', $subscribersIds)));
        try {
            $command = db()->createCommand();
            $command->update('{{list_subscriber}}', [
                'status'        => ListSubscriber::STATUS_UNSUBSCRIBED,
                'last_updated'  => MW_DATETIME_NOW,
            ], ['and',
                ['in', 'subscriber_id', $subscribersIds],
                ['in', 'status', [ListSubscriber::STATUS_CONFIRMED]],
            ]);
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }

        // since 1.6.4
        Lists::flushSubscribersCountCacheBySubscriberIds($subscribersIds);
    }

    /**
     * Disable subscribers matching the criteria
     */
    public function disableSubscribers(): void
    {
        array_map([$this, 'disableSubscribersByIds'], $this->getSubscribersIdsChunks());
    }

    /**
     * @param array $subscribersIds
     *
     * @throws CException
     */
    public function disableSubscribersByIds(array $subscribersIds = []): void
    {
        if (empty($subscribersIds)) {
            return;
        }

        $subscribersIds = array_filter(array_unique(array_map('intval', $subscribersIds)));
        try {
            $command = db()->createCommand();
            $command->update('{{list_subscriber}}', [
                'status'        => ListSubscriber::STATUS_DISABLED,
                'last_updated'  => MW_DATETIME_NOW,
            ], ['and',
                ['in', 'subscriber_id', $subscribersIds],
                ['in', 'status', [ListSubscriber::STATUS_CONFIRMED]],
            ]);
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }

        // since 1.6.4
        Lists::flushSubscribersCountCacheBySubscriberIds($subscribersIds);
    }

    /**
     * Blacklist subscribers matching the criteria
     */
    public function blacklistSubscribers(): void
    {
        array_map([$this, 'blacklistSubscribersById'], $this->getSubscribersIdsChunks());
    }

    /**
     * @param array $subscribersIds
     *
     * @throws CException
     */
    public function blacklistSubscribersById(array $subscribersIds = []): void
    {
        if (empty($subscribersIds)) {
            return;
        }

        $subscribersIds = array_filter(array_unique(array_map('intval', $subscribersIds)));

        try {
            $command = db()->createCommand();
            $command->update('{{list_subscriber}}', [
                'status'        => ListSubscriber::STATUS_BLACKLISTED,
                'last_updated'  => MW_DATETIME_NOW,
            ], ['and',
                ['in', 'subscriber_id', $subscribersIds],
                ['not in', 'status', [ListSubscriber::STATUS_BLACKLISTED, ListSubscriber::STATUS_MOVED]],
            ]);

            foreach ($subscribersIds as $subscriberId) {
                try {
                    $subscriber = ListSubscriber::model()->findByPk((int)$subscriberId);
                    $customerEmailBlacklist = new CustomerEmailBlacklist();
                    $customerEmailBlacklist->customer_id = $this->getCustomer()->customer_id;
                    $customerEmailBlacklist->email       = $subscriber->email;
                    $customerEmailBlacklist->save();
                } catch (Exception $e) {
                    Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
                }
            }
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }

        // since 1.6.4
        Lists::flushSubscribersCountCacheBySubscriberIds($subscribersIds);
    }

    /**
     * Delete subscribers matching the criteria
     */
    public function deleteSubscribers(): int
    {
        return array_sum(array_map([$this, 'deleteSubscribersByIds'], $this->getSubscribersIdsChunks()));
    }

    /**
     * @param array $subscribersIds
     *
     * @return int
     * @throws CException
     */
    public function deleteSubscribersByIds(array $subscribersIds = []): int
    {
        if (empty($subscribersIds)) {
            return 0;
        }

        $subscribersIds = array_filter(array_unique(array_map('intval', $subscribersIds)));

        // since 1.6.4
        Lists::flushSubscribersCountCacheBySubscriberIds($subscribersIds);

        $command = db()->createCommand();
        $subscribers = $command->select('email')->from('{{list_subscriber}}')->where(['and',
            ['in', 'subscriber_id', $subscribersIds],
            ['in', 'status', [ListSubscriber::STATUS_BLACKLISTED]],
        ])->queryAll();

        if (!empty($subscribers)) {
            $emails = [];
            foreach ($subscribers as $subscriber) {
                $emails[] = $subscriber['email'];
            }
            $emails = array_chunk($emails, 100);
            foreach ($emails as $emailsChunk) {
                $command = db()->createCommand();
                $command->delete('{{customer_email_blacklist}}', ['and',
                    ['in', 'email', $emailsChunk],
                    ['in', 'customer_id', [$this->getCustomer()->customer_id]],
                ]);
            }
        }

        $count = 0;
        try {
            $command = db()->createCommand();
            $count   = $command->delete('{{list_subscriber}}', ['and',
                ['in', 'subscriber_id', $subscribersIds],
            ]);
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }

        return $count;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        if (!empty($this->customer)) {
            return $this->customer;
        }

        if (!empty($this->customer_id)) {
            return $this->customer = Customer::model()->findByPk($this->customer_id);
        }

        $customer = new Customer();
        $customer->customer_id = 0;

        return $customer;
    }

    /**
     * @return string
     */
    public function getDatePickerFormat(): string
    {
        return 'yy-mm-dd';
    }

    /**
     * @return string
     */
    public function getDatePickerLanguage(): string
    {
        $language = app()->getLanguage();
        if (strpos($language, '_') === false) {
            return $language;
        }
        $language = explode('_', $language);

        return $language[0];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function _validateMultipleListsSelection(string $attribute, array $params = []): void
    {
        $values = $this->$attribute;
        if (empty($values) || !is_array($values)) {
            $values = [];
        }

        $lists = array_keys($this->getListsList());

        foreach ($values as $value) {
            if (!in_array($value, $lists)) {
                $this->addError($attribute, t('list_subscribers', 'Invalid list identifier!'));
                break;
            }
        }
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function _validateMultipleStatusesSelection(string $attribute, array $params = []): void
    {
        $values = $this->$attribute;
        if (empty($values) || !is_array($values)) {
            return;
        }

        $this->$attribute = $values = array_filter(array_unique(array_values($values)));
        if (empty($values)) {
            return;
        }

        $statuses = array_keys($this->getStatusesList());

        foreach ($values as $value) {
            if (!in_array($value, $statuses)) {
                $this->addError($attribute, t('list_subscribers', 'Invalid subscriber status!'));
                break;
            }
        }
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function _validateMultipleSourcesSelection(string $attribute, array $params = []): void
    {
        $values = $this->$attribute;
        if (empty($values) || !is_array($values)) {
            return;
        }

        $this->$attribute = $values = array_filter(array_unique(array_values($values)));
        if (empty($values)) {
            return;
        }

        $statuses = array_keys($this->getSourcesList());
        foreach ($values as $value) {
            if (!in_array($value, $statuses)) {
                $this->addError($attribute, t('list_subscribers', 'Invalid list source!'));
                break;
            }
        }
    }
}
