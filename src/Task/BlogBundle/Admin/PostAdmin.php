<?php
namespace Task\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text')
            ->add('excerpt', 'textarea')
            ->add('slug', 'text')
            ->add('body', 'textarea')
            ->add('author', 'text')
            ->add('published_at', 'date')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('slug')
            ->add('author');
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {

        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $object->setUser($user);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $object->setUser($user);
    }
}